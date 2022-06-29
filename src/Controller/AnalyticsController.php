<?php

namespace App\Controller;

use App\Services\AnalyticsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AnalyticsController extends AbstractController
{
    public function __construct(private AnalyticsService $analyticsService)
    {
    }

    #[Route('/g/collect', name: 'collect_analytics', methods: ['GET','POST'])]
    public function index(Request $request): Response
    {
        $this->analyticsService->handleAnalyticsEvent($request);

        return new Response(null, 200);
    }
}
