<?php

namespace Controller;

/**
 * ChartbreakerController
 * 
 * Controller für Chartbreaker-bezogene API-Endpunkte
 */
class ChartbreakerController
{
    /**
     * Beispielmethode für Dashboard-Daten
     * 
     * @return array Dashboard-Daten für die Frontend-Anzeige
     */
    public function dashboardData()
    {
        // Beispieldaten für das Dashboard
        return [
            'status' => 'active',
            'total_votes' => 1247,
            'active_charts' => 5,
            'top_songs' => [
                [
                    'id' => 1,
                    'title' => 'Example Song 1',
                    'artist' => 'Example Artist 1',
                    'votes' => 156,
                    'position' => 1
                ],
                [
                    'id' => 2,
                    'title' => 'Example Song 2',
                    'artist' => 'Example Artist 2',
                    'votes' => 134,
                    'position' => 2
                ],
                [
                    'id' => 3,
                    'title' => 'Example Song 3',
                    'artist' => 'Example Artist 3',
                    'votes' => 98,
                    'position' => 3
                ]
            ],
            'recent_votes' => [
                [
                    'song_id' => 1,
                    'timestamp' => date('c', strtotime('-5 minutes')),
                    'user_id' => 'user123'
                ],
                [
                    'song_id' => 2,
                    'timestamp' => date('c', strtotime('-8 minutes')),
                    'user_id' => 'user456'
                ],
                [
                    'song_id' => 1,
                    'timestamp' => date('c', strtotime('-12 minutes')),
                    'user_id' => 'user789'
                ]
            ],
            'last_updated' => date('c')
        ];
    }
    
    /**
     * Weitere Beispielmethoden können hier hinzugefügt werden
     */
}