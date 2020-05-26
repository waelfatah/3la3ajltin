<?php

namespace SerializerApiBundle\Controller;

use SerializerApiBundle\Entity\Task;
use SerializerApiBundle\SerializerApiBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class TaskController extends Controller
{
    public function allAction()
    {
        $tasks = $this->getDoctrine()->getManager()
            ->getRepository('SerializerApiBundle:Task')
            ->findAll();
        $serialzer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serialzer->normalize($tasks);
        return new JsonResponse($formatted);
    }

    public function findAction($id)
    {
        $tasks = $this->getDoctrine()->getManager()
            ->getRepository('SerializerApiBundle:Task')
            ->find($id);
        $serialzer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serialzer->normalize($tasks);
        return new JsonResponse($formatted);
    }

    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $task = new Task();
        $task->setName($request->get('name'));
        $task->setStatus($request->get('status'));
        $em->persist($task);
        $em->flush();
        $serialzer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serialzer->normalize($task);
        return new JsonResponse($formatted);
    }
}
