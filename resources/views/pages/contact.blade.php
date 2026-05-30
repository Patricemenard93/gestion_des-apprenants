@extends('layouts.public')

@section('title', 'Contact - CFTP-L2C')

@section('content')

    {{-- Page header --}}
    <section class="pub-page-header">
        <div class="container">
            <span class="pub-badge-label">Contact</span>
            <h1 class="pub-page-title">Nous contacter</h1>
            <p class="pub-page-desc">Vous avez des questions sur nos formations ou sur l'application de gestion ? N'hesitez pas a nous contacter.</p>
        </div>
    </section>

    {{-- Contact content --}}
    <section class="pub-section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <h2 class="pub-section-title mb-4">Informations de contact</h2>

                    <div class="pub-contact-list">
                        <div class="pub-contact-item">
                            <div class="pub-contact-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <strong>Adresse</strong>
                                <p>Centre de Formation CFTP-L2C</p>
                            </div>
                        </div>
                        <div class="pub-contact-item">
                            <div class="pub-contact-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </div>
                            <div>
                                <strong>Email</strong>
                                <p>contact@cftp-l2c.test</p>
                            </div>
                        </div>
                        <div class="pub-contact-item">
                            <div class="pub-contact-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </div>
                            <div>
                                <strong>Telephone</strong>
                                <p>+221 XX XXX XX XX</p>
                            </div>
                        </div>
                        <div class="pub-contact-item">
                            <div class="pub-contact-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div>
                                <strong>Horaires</strong>
                                <p>Lundi - Vendredi : 8h00 - 17h00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="pub-contact-form-card">
                        <h3>Envoyez-nous un message</h3>
                        <p class="text-muted mb-4">Remplissez le formulaire ci-dessous et nous vous repondrons dans les plus brefs delais.</p>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nom complet</label>
                                    <input type="text" class="form-control" placeholder="Votre nom">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="votre@email.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Sujet</label>
                                    <select class="form-select">
                                        <option selected disabled>Choisir un sujet</option>
                                        <option>Informations sur les formations</option>
                                        <option>Inscription</option>
                                        <option>Support technique</option>
                                        <option>Autre</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" rows="5" placeholder="Votre message..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="pub-btn pub-btn-primary">Envoyer le message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
