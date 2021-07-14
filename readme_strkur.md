1. **GIT**
vim .gitignore → .env
git rm -r --cached .gitignore
ew git rm -r --cached .

mkdir public/assets; mkdir public/assets/css; touch public/assets/css/darktheme.css;

2. **indexController**
php bin/console make:controller;
IndexController;

$form = $this->createForm(UploadPhotoType::class);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
    $entityManager = $this->getDoctrine()->getManager();


    if ($this->getUser()) { // czy zalogowany?

        /**
            * @var UploadedFile $pictureFileName
            */
        $pictureFileName = $form->get('filename')->getData();

        if ($pictureFileName) {
            try {
                $orginalFileName = pathinfo($pictureFileName->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFileName = transliterator_transliterate(
                    'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()',
                    $orginalFileName
                );
                $safeFileName = $safeFileName .'_'.uniqid() . '.'.$pictureFileName->guessExtension();
                $pictureFileName->move('images/hosting', $safeFileName);


                $entityPhoto = new Photo();
                $entityPhoto->setFilename($safeFileName);
                $entityPhoto->setIspublic($form->get('is_public')->getData());
                $entityPhoto->setUploadedAt(new \DateTimeImmutable());

                $entityPhoto->setUser($this->getUser());

                $entityManager->persist($entityPhoto);
                $entityManager->flush();

                $this->addFlash('success', 'Dodano zdjęcie');
            } catch (\Exception $e) {
                $this->addFlash('success', 'Wystapil nieoczekiwany blad');
            }
        }
    }
}


return $this->render('home/index.html.twig', [
    'form' => $form->createView()
]);




WŁASNY FORM:
php bin/console make:form
    nazwa formularza: UploadPhotoType
    nazwa obłsugiwanej encji: Photo
**UploadPhotoType.php:**
$builder
    ->add('filename')
    ->add('is_public')
;



3. **User Entity**
**php bin/console make:user**
enta, enta, enta, enta
**php bin/console make:entity**
User
add field: username


4. **Photo**
php bin/console make:entity
Photo
filename (string, 255, no nullable)
user (
    ?, relation to User, ManyToOne, 
    no nullable, 
    User->getPhotos(), 
    no automatically deleted orphaned
)
 
php bin/consle make:migration
php bin/console doctrine:migrations:migrate

php bin/console make:entity
Photo
add: 
is_public (bool, no nullable)
updated_at (datetime immutable, no nullable)

php bin/consle make:migration
php bin/console doctrine:migrations:migrate

5. **Autoryzacja**
php bin/console make:auth
    1. Login Form Authentiocator
    LoginFormAuthenticatior
    enta → securityController
    generate logout

php bin/console make:registration-form
    yes - add a Ubuqentity
    no - no senr email
    yes - automaticly authenticate
    home - route after registration

**Form/RegistrationFormType.php**
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

    ->add('filename', FileType::class, [
        'label' => 'Wybierz plik',
        'constraints' => [
            new File([
                'maxSize' => '2M',
                'mimeTypes' => [
                    'image/*'
                ],
                'mimeTypesMessage' => 'Obsługiwany format pliku musi być zdjęciem.',
            ])
        ]
    ])
    // ->add('updated_at') // użytkownik ręcznie nie wykona tych akcji
    ->add('is_public', CheckboxType::class, [
        'label' => 'publiczny',
        'required' => false
    ])

mkdir public/assets/hosting;


**LoginFormAuthenticator, line 54**
return new RedirectResponse  ($this->urlGenerator->generate('home'));


**templates/registration/register.html.twig**
{% extends('layouts/base.html.twig') %}

{% block content %}
    <div class="container">

    {% for flashError in app.flashes('verify_email_error') %}
        <div class="alert alert-danger" role="alert">{{ flashError }}</div>
    {% endfor %}

    <h1>Register</h1>

    {% form_theme registrationForm 'bootstrap_5_layout.html.twig' %}
    {{ form_start(registrationForm) }}
        {{ form_row(registrationForm.username) }}
        {{ form_row(registrationForm.email) }}
        {{ form_row(registrationForm.plainPassword, {
            label: 'Password'
        }) }}
        {{ form_row(registrationForm.agreeTerms) }}

        <button type="submit" class="btn btn-info">Rejestracja</button>
    {{ form_end(registrationForm) }}
    </div>

{% endblock %}


