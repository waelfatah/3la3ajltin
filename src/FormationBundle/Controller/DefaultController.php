<?php

namespace FormationBundle\Controller;

use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('@Formation/Default/index.html.twig');
    }
    public function indexnotifAction(Request $request,$notifiable)
    {
        return $this->render('@Formation/Default/notifications.html.twig');
    }
    public function sendNotificationAction(Request $request)
    {
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Hello world !');
        $notif->setMessage('This a notification.');
        $notif->setLink('http://symfony.com/');
        // or the one-line method :
        // $manager->createNotification('Notification subject','Some random text','http://google.fr');

        // you can add a notification to a list of entities
        // the third parameter ``$flush`` allows you to directly flush the entities
        try {
            $manager->addNotification(array($this->getUser()), $notif, true);
        } catch (OptimisticLockException $e) {
        }

        return $this->redirectToRoute('Notification_afficher');
    }
}
