@extends ('base_layout')
@push('google_analytic')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118215472-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118215472-1');
    </script>
@endpush

@push('stylesheets')
    <style>
        h5.about{
            font-size: 20px;
            color: #00d7b3;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header bg-black-222">
        <div class="container pt-10 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-8 xs-text-center">
                        <h3 class="text-white mt-10">Conditions générales d'utilisation</h3>
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb white mt-10 text-right xs-text-center">
                            <li><a href="{{ route('homepage') }}">Accueil</a></li>
                            <li class="active">Conditions générales d'utilisation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-push-1">
                    <div id="section-one" class="mb-50">
                        <p>
                            Le présent site Web, ainsi que tout sous-domaine connexe (le « Site Web »), est publié et
                            mis à jour par L'école du costume (« Cosplay School »,« L'école du costume »,  « nous »,
                            « notre », « nos » ou la « Société »).
                            Lorsque vous accédez au Site Web, le parcourez ou l’utilisez, ou lorsque vous utilisez toute
                            fonction du Site Web, vous acceptez et convenez, sans limitation ni réserve, de vous
                            conformer aux modalités et conditions énoncées ci-après (les « Conditions d’utilisation »).
                        </p>
                        <p>
                            Aux fins des présentes Conditions d’utilisation :

                            les expressions « comprend », « comprennent » et « y compris » signifient
                            « comprend notamment », « comprennent notamment » et « y compris notamment », et ne
                            sauraient être interprétées comme limitant la portée de tout énoncé général qui les
                            précède aux questions ou éléments spécifiques qui les suivent;
                            les expressions « vous », « votre » et « vos » désignent la personne physique qui utilise
                            le Site Web ou y accède ou qui achète des produits pour son usage personnel.
                        </p>
                        <p>
                            En accédant au Site Web ou en l’utilisant, vous reconnaissez avoir lu et accepté les
                            présentes Conditions d’utilisation et la Politique de confidentialité. Veuillez lire les
                            présentes Conditions d’utilisation et la Politique de confidentialité attentivement.
                        </p>
                        <p>
                            SI VOUS N’ACCEPTEZ PAS LES PRÉSENTES MODALITÉS ET CONDITIONS OU LA POLITIQUE DE
                            CONFIDENTIALITÉ, VOUS NE POUVEZ PAS UTILISER LE SITE WEB.
                        </p>
                    </div>
                    <div id="section-two" class="mb-50">
                        <h3>Admissibilité</h3>
                        <hr>
                        <p class="mb-20">
                            En utilisant le Site Web, vous déclarez et garantissez ce qui suit : a) vous n’avez jamais
                            fait l’objet d’une suspension ou d’une interdiction d’usage du Site Web, et vous ne vous
                            êtes pas adonné à toute activité pouvant mener à votre suspension ou votre interdiction
                            d’usage du Site Web, b) vous n’avez pas plus d’un compte pour utiliser le Site Web
                            (un « Compte Cosplay School »), et c) vous avez tout le pouvoir et l’autorité nécessaires pour
                            accepter les présentes Conditions d’utilisation et vous n’enfreignez aucune autre entente
                            que vous avez conclue avec un tiers en acceptant les présentes Conditions d’utilisation.
                        </p>
                        <p>
                            Nous mettons continuellement à l’essai de nouvelles fonctionnalités, de nouveaux services,
                            de nouvelles interfaces pour nos usagers et de nouveaux produits que nous envisageons
                            d’intégrer à notre Site Web et à nos services. Nous nous réservons le droit de vous faire
                            participer à ces essais ou de vous en exclure sans préavis.
                        </p>
                    </div>
                    <div id="section-three" class="mb-50">
                        <h3>Conditions relatives à l’utilisation du Site Web</h3>
                        <hr>
                        <p class="mb-20">
                            Pour accéder au Site Web, il vous faut un navigateur Web compatible. Pour accéder aux autres
                            plateformes, vous pourriez devoir télécharger une application sur votre ordinateur ou votre
                            appareil mobile. Vous reconnaissez et acceptez que la Société peut cesser de prendre en
                            charge un navigateur Web donné et que vous devrez alors télécharger un navigateur Web
                            compatible pour pouvoir continuer à utiliser le Site Web et les services qu’il fournit.
                            Vous acceptez et reconnaissez également que le fonctionnement du Site Web et l’accès aux
                            services qu’il fournit dépendent du bon fonctionnement de votre équipement informatique et
                            de votre connexion à Internet.
                        </p>
                        <p>
                            Vous pourriez devoir créer un Compte Cosplay School pour utiliser une partie ou la totalité du
                            Site Web ou des services qu’il fournit. Vous êtes l’unique responsable de la gestion de
                            votre Compte Cosplay School et de votre mot de passe et il n’incombe qu’à vous de préserver la
                            confidentialité de votre mot de passe. Si vous avez oublié votre mot de passe, cliquez sur
                            le lien « Mot de passe oublié? » et suivez les directives à l’écran. Il n’incombe également
                            qu’à vous de limiter l’accès à votre Compte Cosplay School.
                        </p>
                        <p>
                            Vous convenez que vous êtes responsable de toutes les activités effectuées sur votre
                            Compte Cosplay School ou avec votre mot de passe, par vous ou des tiers, y compris les paiements
                            ou les achats effectués au moyen de votre Compte Cosplay School. Si vous pensez qu’un tiers a
                            obtenu ou deviné votre mot de passe, veuillez utiliser la fonction de régénération du mot
                            de passe du Site Web le plus rapidement possible pour obtenir un nouveau mot de passe.
                        </p>
                        <p>

                            Pour pouvoir utiliser le Site Web, vous convenez de :
                        </p>
                        <ul class="list theme-colored">
                            <li>
                                vous assurer que l’information que vous nous avez fournie dans votre Compte Cosplay School
                                est exacte, à jour et complète;
                            </li>
                            <li>
                                n'usurper l’identité d’une autre personne ni faire une fausse déclaration au sujet de vos
                                liens avec une personne ou une entité;
                            </li>
                            <li>
                                ne pas accéder aux éléments non publics du Site Web ou des systèmes informatiques
                                connexes, ni tenter de modifier ou d’utiliser ces éléments non publics et ces systèmes
                                informatiques;
                            </li>
                            <li>
                                ne pas tenter de sonder, d’explorer ou de tester la vulnérabilité du Site Web ou d’un
                                système ou réseau connexe, ni violer les mesures de sécurité ou d’authentification
                                utilisées dans le cadre du Site Web et des systèmes et réseaux;
                            </li>
                            <li>
                                ne pas tenter de décrypter, de décompiler, de désassembler ou de faire de
                                l’ingénierie inverse de tout logiciel utilisé pour opérer le Site Web ou fournir les
                                services offerts au moyen du Site Web;
                            </li>
                            <li>
                                ne pas nuire ou menacer de nuire aux autres utilisateurs de quelque façon que ce soit
                                ou contrecarrer ou tenter de contrecarrer l’accès d’un utilisateur, d’un hôte ou d’un
                                réseau, y compris par la transmission d’un virus, une surcharge, une inondation,
                                du pollupostage (« spam ») ou des bombardements de courriels sur le Site Web ou sur
                                toute fonctionnalité, tout lien, toute adresse courriel ou tout prompteur lié au Site
                                Web ou à tout service fourni au moyen du Site Web;
                            </li>
                            <li>
                                ne pas nous fournir des données de paiement appartenant à un tiers;
                            </li>
                            <li>
                                ne pas utiliser le Site Web d’une façon abusive qui est contraire à son utilisation
                                prévue, à sa documentation ou aux directives raisonnables de la Société;
                            </li>
                            <li>
                                ne pas extraire systématiquement des données ou tout autre contenu du Site Web pour
                                créer ou compiler, directement ou indirectement, au moyen d’un ou de plusieurs
                                téléchargements, une collection ou une compilation de données, une base de données,
                                un répertoire ou tout autre regroupement de données, que ce soit par des méthodes
                                manuelles, au moyen de robots, de collecteurs ou de robots d’indexation, ou autrement;
                            </li>
                            <li>
                                ne pas enfreindre ou autrement violer les droits de propriété intellectuelle de tiers
                                lorsque vous accédez au Site Web ou que vous l’utilisez.
                            </li>
                            <li>
                                La Société a le droit de faire enquête sur tout manquement à ce qui précède et
                                d’intenter des poursuites, le cas échéant, y compris, notamment, toute possible
                                violation de droits de propriété intellectuelle et toute possible atteinte à
                                la sécurité, dans la pleine mesure permise par la loi, et de fermer votre Compte
                                Cosplay School ou de mettre fin à votre utilisation du Site Web en cas de manquement.
                                La Société peut demander l’aide des autorités chargées de l’application des lois et
                                collaborer avec celles-ci pour intenter des poursuites contre les utilisateurs qui
                                violent les présentes Conditions d’utilisation. Vous reconnaissez que bien que la
                                Société ne soit pas tenue de surveiller votre accès au Site Web ou l’utilisation que
                                vous en faites, elle a le droit de le faire dans le cadre de la prestation des services
                                fournis au moyen du Site Web, afin de s’assurer que vous respectez les présentes
                                Conditions d’utilisation ou pour respecter les lois applicables ou une ordonnance ou
                                les exigences d’un tribunal, d’un organisme administratif ou d’un autre organisme
                                gouvernemental.
                            </li>
                        </ul>
                    </div>
                    <div id="section-four" class="mb-50">
                        <h3>Licence</h3>
                        <hr>
                        <p class="mb-20">
                            Cosplay School vous accorde le droit personnel, incessible, non exclusif, révocable et limité
                            d’accéder au Site Web et de l’utiliser à des fins personnelles, à titre de consommateur.
                        </p>
                        <p>
                            À l’exception de la licence limitée qui vous est expressément accordée aux termes des
                            présentes Conditions d’utilisation, aucun droit à la propriété intellectuelle de Cosplay School
                            ne vous est conféré.
                        </p>
                    </div>
                    <div id="section-five" class="mb-50">
                        <h3>Droits exclusifs</h3>
                        <hr>
                        <p class="mb-20">
                            Tous les droits, le titre et les intérêts relatifs au Site Web, au Compte Cosplay School et aux
                            services fournis au moyen du Site Web sont et demeurent la propriété exclusive de Cosplay School
                            et de ses concédants de licence. Le Site Web et les services fournis par l’intermédiaire du
                            Site Web sont protégés par les lois sur le droit d’auteur, les marques de commerce et
                            d’autres lois nationales et étrangères sur la propriété intellectuelle. À moins d’y être
                            expressément autorisé en vertu des présentes Conditions d’utilisation, vous ne pouvez pas
                            reproduire, modifier, distribuer, vendre, transférer, afficher publiquement,
                            exécuter publiquement, transmettre ou autrement utiliser ou exploiter commercialement
                            le Site Web, ou en créer des œuvres dérivées.
                        </p>
                    </div>
                    <div id="section-six" class="mb-50">
                        <h3>Communications électroniques</h3>
                        <hr>
                        <p class="mb-20">
                            Lorsque vous visitez le Site Web, que vous nous envoyez des courriels, ou que vous
                            utilisez notre chat en direct, vous communiquez avec nous par voie électronique et, par
                            les présentes, vous consentez à recevoir des communications électroniques de notre part.
                            Nous pouvons communiquer avec vous au moyen de courriels ou d’avis affichés sur le Site Web.
                            Vous convenez que lorsque nous vous envoyons par voie électronique des ententes, avis,
                            informations et autres communications, nous nous conformons à toute exigence légale
                            stipulant que de telles communications doivent être sous forme écrite
                        </p>
                    </div>
                    <div id="section-six" class="mb-50">
                        <h3>Exonération de garantie et limite de responsabilité</h3>
                        <hr>
                        <p class="mb-20">
                            DANS LA PLEINE MESURE PERMISE PAR LES LOIS APPLICABLES, LA SOCIÉTÉ NE DONNE AUCUNE
                            GARANTIE ET NE FAIT AUCUNE DÉCLARATION RELATIVEMENT AU SITE WEB. EN PARTICULIER, LA
                            SOCIÉTÉ NE DÉCLARE PAS ET NE GARANTIT PAS QUE LE SITE WEB RÉPONDRA À VOS BESOINS OU QU’IL
                            SERA COMPATIBLE AVEC TOUT MATÉRIEL OU LOGICIEL FOURNI PAR DES TIERS, QUE LE SITE WEB NE
                            SERA PAS INTERROMPU, QU’IL SERA EXEMPT DE PROBLÈMES OU D’ERREURS OU QUE TOUTES LES ERREURS
                            SERONT CORRIGÉES. LA SOCIÉTÉ FOURNIT LE SITE WEB « TEL QUEL » ET « TEL QUE DISPONIBLE ».
                        </p>
                    </div>
                    <div id="section-six" class="mb-50">
                        <h3>Exonération de garantie et limite de responsabilité</h3>
                        <hr>
                        <p class="mb-20">
                            DANS LA PLEINE MESURE PERMISE PAR LES LOIS APPLICABLES, LA SOCIÉTÉ NE DONNE AUCUNE
                            GARANTIE ET NE FAIT AUCUNE DÉCLARATION RELATIVEMENT AU SITE WEB. EN PARTICULIER, LA
                            SOCIÉTÉ NE DÉCLARE PAS ET NE GARANTIT PAS QUE LE SITE WEB RÉPONDRA À VOS BESOINS OU QU’IL
                            SERA COMPATIBLE AVEC TOUT MATÉRIEL OU LOGICIEL FOURNI PAR DES TIERS, QUE LE SITE WEB NE
                            SERA PAS INTERROMPU, QU’IL SERA EXEMPT DE PROBLÈMES OU D’ERREURS OU QUE TOUTES LES ERREURS
                            SERONT CORRIGÉES. LA SOCIÉTÉ FOURNIT LE SITE WEB « TEL QUEL » ET « TEL QUE DISPONIBLE ».
                        </p>
                    </div>
                    <div id="section-six" class="mb-50">
                        <h3>Indemnisation</h3>
                        <hr>
                        <p class="mb-20">
                            Vous acceptez de défendre, d’indemniser et d’exonérer Cosplay School, ses dirigeants, ses
                            administrateurs, les membres de son groupe, ses employés et ses mandataires relativement à
                            l’ensemble des réclamations, obligations, dommages-intérêts, pertes et dépenses, y compris
                            les honoraires juridiques et comptables raisonnables, qui sont liés de quelque façon que ce
                            soit à votre accès au Site Web et au Compte Cosplay School connexe, ou à votre utilisation du
                            Site Web ou du Compte Cosplay School connexe.
                        </p>
                    </div>
                    <div id="section-six" class="mb-50">
                        <h3>Droit de modifier les présentes Conditions d’utilisation ou le contenu du Site Web</h3>
                        <hr>
                        <p class="mb-20">
                            La Société se réserve le droit d’ajouter, de modifier ou de supprimer tout élément des
                            présentes Conditions d’utilisation à tout moment, sans préavis. Toute modification apportée
                            aux présentes Conditions d’utilisation ou à toute modalité affichée sur le Site Web entre
                            en vigueur au moment de sa publication. En continuant à utiliser le Site Web ou le Compte
                            Cosplay School après la publication de toute modification, vous signifiez que vous acceptez ces
                            modifications et que vous y consentez. De plus, la Société se réserve le droit d’ajouter,
                            de modifier, de discontinuer, de supprimer et de suspendre tout autre Contenu affiché sur
                            le Site Web, y compris des caractéristiques et des spécifications de produits décrits ou
                            présentés sur le Site Web, temporairement ou de façon permanente, à tout moment et sans
                            préavis, et sans engager sa responsabilité.
                        </p>
                    </div>
                    <div id="section-six" class="mb-50">
                        <h3>Modalités générales</h3>
                        <hr>
                        <p class="mb-20">
                            Les Conditions d’utilisation sont régies par les lois de la province de Québec, au Canada,
                            et les lois du Canada qui s’y appliquent, et elles seront interprétées conformément à ces
                            lois. Par les présentes, les parties s’en remettent irrévocablement à la compétence des
                            tribunaux du district de Québec, dans la province de Québec.
                        </p>
                        <p>
                            Les présentes Conditions d’utilisation constituent l’entente intégrale et exclusive
                            intervenue entre Cosplay School et vous-même quant à l’utilisation du Site Web, et les
                            présentes Conditions d’utilisation remplacent toute entente antérieure intervenue entre
                            Cosplay School et vous-même au sujet du Site Web.
                        </p>
                        <p>
                            Vous vous engagez à ne pas céder ou autrement transférer à un tiers les présentes
                            Conditions d’utilisation ou l’un ou l’autre des droits ou des obligations qu’elles vous
                            confèrent sans notre consentement préalable écrit, lequel consentement est à notre entière
                            discrétion. Aucune cession ou délégation effectuée par vous ne saurait vous décharger ou
                            vous libérer de vos obligations aux termes des présentes Conditions d’utilisation. Sous
                            réserve de ce qui précède, les présentes Conditions d’utilisation lient chacune des parties
                            ainsi que leurs successeurs et ayants droit respectifs, et elles s’appliquent au profit de
                            chacun d’eux et peuvent être mises à exécution par chacun d’eux. Cosplay School a le droit de
                            céder les présentes Conditions d’utilisation à un tiers sans demander votre consentement.
                        </p>
                        <p>
                            Aucune disposition des présentes Conditions d’utilisation ne saurait constituer une
                            société de personnes ou une coentreprise entre vous et la Société.
                        </p>
                        <p>
                            Si une disposition donnée des présentes Conditions d’utilisation est déclarée invalide par
                            un tribunal compétent, elle sera réputée retranchée des présentes Conditions d’utilisation,
                            et n’entachera pas la validité des présentes Conditions d’utilisation dans leur ensemble.
                        </p>
                        <p>
                            Les présentes Conditions d’utilisations ont été mises à jour le 22 Novembre 2018.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection