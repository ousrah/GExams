<?php
namespace App\EventSubscriber;


use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

use Symfony\Component\Security\Core\Security;
use App\Entity\User;

class EntitySubscriber  implements EventSubscriberInterface
{
    
private $security;
public function __construct (Security $security)
{
    $this->security = $security;
}   
    // this method can only return the event names; you cannot define a
    // custom method name to execute when each event triggers
    public function getSubscribedEvents(): array
    {

    
        return [
            Events::prePersist,
            Events::postPersist,
            Events::postRemove,
        //    Events::postUpdate,
          
        ];
    }

    // callback methods must be called exactly like the events they listen to;
    // they receive an argument of type LifecycleEventArgs, which gives you access
    // to both the entity object of the event and the entity manager itself
    public function prePersist(LifecycleEventArgs $args): void
    {
    
        $entity = $args->getEntity();

        if (($entity instanceof User)) {
            $entity->setLocale('fr_FR');
          
        }
        else
        {
         
   /*     $user = $this->security->getUser();
   	if( !$entity->getCreatedAt())
        {
	     $entity->setCreatedBy($user);
             $entity->setCreatedAt(new \DateTime());
	}
	$entity->setEditedBy($user);
        $entity->setEditedAt(new \DateTime());*/
        }
    }

    public function postPersist(LifecycleEventArgs $args): void
    {
        $this->logActivity('persist', $args);
    }

    public function postRemove(LifecycleEventArgs $args): void
    {
        $this->logActivity('remove', $args);
    }

   /* public function postUpdate(PreUpdateEventArgs $event): void
    {
        $this->logActivity('postUpdate', $args);
    }*/

    private function logActivity(string $action, LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        // if this subscriber only applies to certain entity types,
        // add some code to check the entity type as early as possible
        if (!$entity instanceof User) {
            return;
        }

        // ... get the entity information and log it somehow
    }
}

