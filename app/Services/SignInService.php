<?php

namespace App\Services;

use App\Repositories\SignInInterface;
use App\Validation\SignInValidation;

class SignInService
{
    protected $validationService;
    protected $signInRepository;

    public function __construct(SignInValidation $validationService, SignInInterface $signInRepository)
    {
        $this->validationService = $validationService;
        $this->signInRepository = $signInRepository;
    }

    public function create(array $data)
    {
        $validator = $this->validationService->createValidator($data);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()->toArray()];
        }

        return $this->signInRepository->create($data);
    }

    public function update($id, array $data)
    {
        $data['id'] = $id;
        $validator = $this->validationService->updateValidator($data);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()->toArray()];
        }

        $signIn = $this->signInRepository->getById($id);

        if (!$signIn) {
            return ['errors' => ['User not found']];
        }

        return $this->signInRepository->update($signIn, $data);
    }

    public function delete($id): bool
    {
        $signIn = $this->signInRepository->getById($id);

        if (!$signIn) {
            return false; // Silinmek istenen kullanıcı bulunamadı
        }

        $this->signInRepository->delete($signIn);

        return true; // Başarılı bir şekilde silindi
    }


    public function getById($id)
    {
        return $this->signInRepository->getById($id);
    }


    public function getAll()
    {
        return $this->signInRepository->getAll();
    }
}

