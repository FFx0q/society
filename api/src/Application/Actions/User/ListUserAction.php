<?php
    namespace Society\Application\Actions\User;

    use Psr\Http\Message\ResponseInterface as Response;
    use Society\Domain\User\User;

    class ListUserAction extends UserAction
    {
        protected function action(): Response
        {
            $users = $this->userRepository->all();
            return $this->respondWithData($users);
        }
    }
