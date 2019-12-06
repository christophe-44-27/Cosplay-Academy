<h3>Nouvelle inscription à un cours !</h3>

<p>Félicitations, une nouvelle inscription à votre cours {{ $earning->course->title }} a été enregistrée !</p>

<p>Votre compte a été crédité de {{ ($earning->amount) - (($earning->amount) * getenv('APPLICATION_FEE_GLOBAL_RATE') / 100)}} $</p>

<p>A ne pas oublier, le virement de votre argent sera toujours fait le 15 du mois suivant, sauf si nous avons dépassé le dernier jours du mois
en cours. Exemple : Des clients ont acheté mes cours avant le 30 Décembre, je recevrais mon argent le 15 Janvier. Des clients ont acheté mes
cours le 1 Janvier, je recevrais mon argent le 15 Février.</p>

<p>Merci de votre compréhension, et de votre confiance, l'équipe de la Cosplay Academy</p>
