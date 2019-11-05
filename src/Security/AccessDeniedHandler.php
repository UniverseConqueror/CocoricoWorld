<?php


namespace App\Security;

use App\Repository\UniversRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    /** @var Environment */
    private $environment;

    /** @var UniversRepository */
    private $universRepository;

    /**
     * AccessDeniedHandler constructor.
     *
     * @param Environment       $environment
     * @param UniversRepository $universRepository
     */
    public function __construct(Environment $environment, UniversRepository $universRepository)
    {
        $this->environment = $environment;
        $this->universRepository = $universRepository;
    }

    /**
     * Retrieves information related to the error and returns to the 403 template defined in the Exception folder
     *
     * if ($this->getUser()->getId() !== $id) {
     *
     *     throw new AccessDeniedException('You are not allowed to access this page');
     * }
     *
     * @param  Request               $request
     * @param  AccessDeniedException $accessDeniedException
     *
     * @return Response|null
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        $univers = $this->universRepository->findAllUniversWithCategoriesAndSubcategories();
        $this->environment->addGlobal('universes', $univers);

        return new Response(
            $this->environment->render('bundles/TwigBundle/Exception/error403.html.twig'),
            403
        );
    }
}
