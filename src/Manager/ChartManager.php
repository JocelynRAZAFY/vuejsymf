<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 06/06/19
 * Time: 17:42
 */

namespace App\Manager;


use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ChartManager extends BaseManager
{
    /**
     * @var array
     */
    private $backgroundColors = [
        'rgba(245, 74, 85, 0.5)',
        'rgba(90, 173, 246, 0.5)',
        'rgba(245, 192, 50, 0.5)'
    ];

    /**
     * ChartManager constructor.
     * @param EntityManagerInterface $em
     * @param ContainerInterface $container
     * @param RequestStack $requestStack
     * @param SessionInterface $session
     * @param LoggerInterface $logger
     * @param SerializerInterface $serializer
     */
    public function __construct(
        EntityManagerInterface $em,
        ContainerInterface $container,
        RequestStack $requestStack,
        SessionInterface $session,
        LoggerInterface $logger,
        SerializerInterface $serializer)
    {
        parent::__construct($em, $container, $requestStack, $session, $logger, $serializer);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function lineChart()
    {
        $lineChart = [
            'lineChartData' => $this->getDataChart(),
            'lineChartOptions' => [
                'responsive' => true,
                'maintainAspectRatio' => false,
                'scales' => [
                    'xAxes' => [
                        [
                            'gridLines' => [
                                'display' => true, 'color' => 'rgba(0, 0, 0, 0.1)']
                        ]
                    ],
                    'yAxes' => [
                        [
                            'gridLines' => [
                                'display' => true, 'color' => 'rgba(0, 0, 0, 0.1)']
                        ]
                    ]
                ]

            ]
        ];

        return $this->success($lineChart);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function radarChart()
    {
        $radarChart = [
            'radarChartData' => $this->getDataChart(),
            'radarChartOptions' => [
                'responsive' => true,
                'maintainAspectRatio' => false,
                ]
        ];

        return $this->success($radarChart);
    }

    public function doughnutChart()
    {
        $doughnutChart = [
            'doughnutChartData' => [
                'labels' => ['Red', 'Green', 'Yellow', 'Grey', 'Dark Grey'],
                'datasets' => [
                    [
                        'data' => [300, 50, 100, 40, 120],
                        'backgroundColor'=> ['#F7464A', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360'],
                        'hoverBackgroundColor' => ['#FF5A5E', '#5AD3D1', '#FFC870', '#A8B3C5', '#616774']
                    ]
                ]
            ],
            'doughnutChartOptions' => [
                'responsive' => true,
                'maintainAspectRatio' => false,
            ]
        ];

        return $this->success($doughnutChart);
    }

    /**
     * @return array
     */
    private function getDataChart(){

        return [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            'datasets' => [
                ['label' => '#1', 'backgroundColor' => $this->backgroundColors[0], 'data' => [65, 59, 80, 81, 56, 55, 40]],
                ['label' => '#2', 'backgroundColor' => $this->backgroundColors[1], 'data' => [12, 42, 121, 56, 24, 12, 2]],
                ['label' => '#3', 'backgroundColor' => $this->backgroundColors[2], 'data' => [2, 123, 154, 76, 54, 23, 5]]
            ]
        ];
    }
}