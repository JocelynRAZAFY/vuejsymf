<?php

namespace App\Controller;

use App\Manager\ChartManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChartController extends AbstractController
{
    /**
     * @var ChartManager
     */
    private $chartManager;

    /**
     * ChartController constructor.
     * @param ChartManager $chartManager
     */
    public function __construct(ChartManager $chartManager)
    {
        $this->chartManager = $chartManager;
    }

    /**
     * @Route("/api/back/chart/line", name="line_chart", methods={"GET"})
     */
    public function lineChart()
    {
        return $this->chartManager->lineChart();
    }

    /**
     * @Route("/api/back/chart/radar", name="radar_chart", methods={"GET"})
     */
    public function radarChart()
    {
        return $this->chartManager->radarChart();
    }

    /**
     * @Route("/api/back/chart/doughnut", name="doughnut_chart", methods={"GET"})
     */
    public function doughnutChart()
    {
        return $this->chartManager->doughnutChart();
    }
}
