<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Dashboard;
use App\Models\Post;
use App\Models\Queuingschedule;

class DashboardController extends Controller
{
    protected function getPostScheduled($ypepost_id)
    {
        if (auth()->check()) {
            $results = DB::table('post as p')
                ->select('p.id as post_id', 'p.enunciated', 'd.publish_at', DB::raw('GROUP_CONCAT(m.name) as media_names'))
                ->join('detailpost as d', 'p.id', '=', 'd.post_id')
                ->join('media as m', 'd.media_id', '=', 'm.id')
                ->where('p.typepost_id', $ypepost_id)
                ->where('d.status', 0)
                ->where('p.user_id', request()->user()->id)
                ->groupBy('p.id', 'p.enunciated', 'd.publish_at')
                ->orderBy('d.publish_at' , 'desc')
                ->get();

            // Convertir la cadena media_names en un arreglo
            $results = $results->map(function ($item) {
                $item->media_names = explode(',', $item->media_names);
                $publishAt = Carbon::parse($item->publish_at);
                $diff = now()->diff($publishAt);
                $item->publish_countdown = "{$diff->days} days, {$diff->h} hours and {$diff->i} minutes";
                return $item;
            });
        } else {
            // Si el usuario no está autenticado, asigna un valor vacío o maneja de otra manera según tus necesidades
            $results = [];
        }
        return $results;
    }

    protected function calculateTime($queuingschedule)
    {
        return $queuingschedule->map(function ($item) {
            $publishAt = Carbon::parse($item->publish_at);

            $diff = now()->diff($publishAt);

            $item->publish_countdown = "{$diff->days} days, {$diff->h} hours and {$diff->i} minutes";

            return $item;
        });
    }

    public function getQueuingschedule()
    {
        $queuingschedule = Queuingschedule::select('id', 'name', 'publish_at')
            ->where('status', 0)
            ->orderBy('publish_at', 'asc')
            ->get();


        $queuingschedule = $this->calculateTime($queuingschedule);

        return $queuingschedule;
    }

    public function index()
    {
        return view(
            'dashboard.index',
            [
                'scheduled' => $this->getPostScheduled(3),
                'queued' => $this->getPostScheduled(2),
                'queuingschedule' => $this->getQueuingschedule()
            ]
        );
    }
}
