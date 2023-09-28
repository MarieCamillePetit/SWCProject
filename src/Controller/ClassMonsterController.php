<?php

namespace App\Controller;

use App\Entity\ClassMonster;
use App\Form\ClassMonsterType;
use App\Repository\ClassMonsterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/class/monster')]
class ClassMonsterController extends AbstractController
{
    #[Route('/', name: 'app_class_monster_index', methods: ['GET'])]
    public function index(ClassMonsterRepository $classMonsterRepository): Response
    {
        return $this->render('class_monster/index.html.twig', [
            'class_monsters' => $classMonsterRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_class_monster_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $classMonster = new ClassMonster();
        $form = $this->createForm(ClassMonsterType::class, $classMonster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($classMonster);
            $entityManager->flush();

            return $this->redirectToRoute('app_class_monster_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('class_monster/new.html.twig', [
            'class_monster' => $classMonster,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_class_monster_show', methods: ['GET'])]
    public function show(ClassMonster $classMonster): Response
    {
        return $this->render('class_monster/show.html.twig', [
            'class_monster' => $classMonster,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_class_monster_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClassMonster $classMonster, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClassMonsterType::class, $classMonster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_class_monster_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('class_monster/edit.html.twig', [
            'class_monster' => $classMonster,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_class_monster_delete', methods: ['POST'])]
    public function delete(Request $request, ClassMonster $classMonster, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classMonster->getId(), $request->request->get('_token'))) {
            $entityManager->remove($classMonster);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_class_monster_index', [], Response::HTTP_SEE_OTHER);
    }
}
