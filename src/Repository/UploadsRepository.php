<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\{Uploads,Agent};
use App\Core\EntityManager;
use DateTime;

class UploadsRepository extends EntityRepository
{
    public function insertUpload($agent,$span,$event){
        // $agentRepository = $this->getEntityManager()->getRepository(Agent::class);
        // $agent = $agentRepository->find($idAgent);

        $upload = new Uploads();
        $dateTime = new DateTime('NOW');
        
        $upload->setDateUpload($dateTime);
        $upload->setTimeUpload($dateTime);
        $upload->setAgent($agent);
        $upload->setSpan($span);
        $upload->setIdEventUpload($event);

        // $agent->addUploads($upload);
        $this->getEntityManager()->persist($upload);
        $this->getEntityManager()->flush();

        return $upload;
    }
}
