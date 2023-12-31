@inject('contact', 'Ellite\\Contact\\Services\\ContactService')

@extends('front.layout.app')

@section('content')
    <main id="contato">
        <section class="bg-light py-2 py-lg-4">
            <div class="container">
                <ul class="mb-0 list-unstyled p-0 row g-1 contacts">
                    @if ($contact->getAdresses())
                        <li class="col-lg-4 address">
                            <div class="card text-primary">
                                <svg width="3em" class="h-100 flex-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <div class="d-flex flex-column justify-content-center">
                                    <span class="h5 mb-0 fw-bold">
                                        {{ __('Visite-nos') }}
                                    </span>
                                    @foreach ($contact->getAdresses() as $address)
                                        <a @if ($address['link']) href="{{ $address['link'] }}" target="_blank" @endif class="text-muted">{{ $address['address'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($contact->getEmails())
                        <li class="col-lg-4">
                            <div class="card text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="3em" class="h-100 flex-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                                <div class="d-flex flex-column justify-content-center">
                                    <span class="h5 mb-0 fw-bold">
                                        {{ __('Envie-nos um e-mail') }}
                                    </span>
                                    @foreach ($contact->getEmails() as $email)
                                        <a href="mailto:{{ $email['email'] }}" class="text-muted">{{ $email['email'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($contact->getPhones())
                        <li class="col-lg-4">
                            <div class="card text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="3em" class="h-100 flex-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                                <div class="d-flex flex-column justify-content-center">
                                    <span class="h5 mb-0 fw-bold">
                                        {{ __('Ligue para a gente') }}
                                    </span>
                                    @foreach ($contact->getPhones() as $phone)
                                        <a class="text-muted" href="tel:+ {{ $phone['phone_link'] }}">{{ $phone['phone'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endif

                </ul>

            </div>
        </section>

        <section class="form-wrapper py-2 py-lg-4">
            <div class="container">
                <div class="row justify-content-center gy-2 gy-lg-0 gx-lg-3">
                    <div class="col-lg-7">
                        <div class="formulario bg-white shadow-lg rounded-3 p-2">
                            <h2 class="h1 text-primary fw-bold text-center">
                                {{ __('Entre em contato') }}
                            </h2>
                            <p class="text-center mb-2">
                                {{ __('Preencha o formulário e nossa equipe vai retornar o quanto antes') }}.
                            </p>
                            <livewire:form-contact />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-contact-iframe-map />
    </main>
@endsection
