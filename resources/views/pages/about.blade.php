@extends('layouts.app')

@section('meta')
<title>About and Press - Biografy and Photos about the author in different languages | {{config('app.name')}}</title>
<link rel="canonical" href="{{config('app.url')}}about-and-press">
@stop

@section('content')
    <section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="breadcrumb">
            </div>
            <div class="page-title">
                <h1>About and Press </h1>
                <h2>BIOGRAPHICAL INFORMATION & PHOTOS</h2>
            </div>
        </div>
    </section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
                  <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                  <li class="active">About & Press</li>
                </ul>
            </nav>

            <div id="menu-responsive-icon">
                <i class="fa fa-reorder"></i>
            </div>

        </div>
    </div>


    <section>
        <div class="container">
            <div class="row  m-b-50">

                    <div class="col-sm-10 col-sm-offset-1 m-b-50">

                        <b>[SHORT BIO]</b><br><br>

    <b>Dimitris Lyacos</b> is the author of <i>Until the Victim Becomes Our Own</i> and the internationally acclaimed <i>Poena Damni</i> trilogy. Defying genre distinctions and described as “total literature,” his work has appeared in translation in more than twenty languages and inspired projects in contemporary music, theatre, dance, visual art and photography.

{{-- OLD SHORT BIO (replaced Oct 2026)
    <b>Dimitris Lyacos</b> is the author of the <i><b>Poena Damni</b> trilogy (Z213: EXIT, With The People From The Bridge, The First Death)</i>. So far translated into ten languages, Poena Damni developed as a work in progress over the course of thirty years with subsequent editions and excerpts appearing in journals around the world, as well as in dialogue with a diverse range of sister projects it inspired. Renowned for combining, in a genre-defying form, themes from literary tradition with elements from ritual, religion, philosophy and anthropology, the trilogy reexamines grand narratives in the context of some of the enduring motifs of the Western Canon, while, at the same time, being one of the most widely acclaimed avant-garde works published in the new millennium.
--}}

                        </div>

                <div class="col-md-3">
                    <div class="heading heading text-left">
                        <div class="lang-option">
                            <p>Read it in:</p>
                            <b data-target="#modal-ger" data-toggle="modal" class="btn btn-outline btn-lighter btn-xs">German</b>
                            <b data-target="#modal-fra" data-toggle="modal" class="btn btn-outline btn-lighter btn-xs">French</b>
                            <b data-target="#modal-gre" data-toggle="modal" class="btn btn-outline btn-lighter btn-xs">Greek</b>
                            <b data-target="#modal-ita" data-toggle="modal" class="btn btn-outline btn-lighter btn-xs">Italian</b>
                            <a target="_BLANK" href="https://www.lyacos.net/public/pdf/shao-xueping-a-note-on-dimitris-lyacos.pdf" class="btn btn-outline btn-lighter btn-xs">Chinese</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6"><b>[LONG BIO]</b><br><br><b>Dimitris Lyacos</b> is the author of <i>Until the Victim Becomes Our Own</i> and the internationally acclaimed <i>Poena Damni</i> trilogy. Defying genre distinctions and described as “total literature,” his work has appeared in translation in more than twenty languages and inspired projects in contemporary music, theatre, dance, visual art and photography.
                        </div>

                        <div class="col-md-6"> <br><br>Moving across prose, poetry, drama and theory, Lyacos examines violence and ritual, exclusion and scapegoating, and the changing forms of the divine. <i>Until the Victim Becomes Our Own</i>, conceived as the book “zeroth” of <i>Poena Damni</i>, traces the transformation of coercion from sacrificial and juridical structures to the cybernetic systems of the present. Published in Italian by Il Saggiatore as <i>Finché la vittima non sarà nostra</i>, it will appear in English on 23 February 2027 from Indirect Books, translated from the Greek by Andrew Barrett.
                        </div>
                    </div>

{{-- OLD LONG BIO (replaced Oct 2026)
                    <div class="row">
                        <div class="col-md-6"><b>[LONG BIO]</b><br><br><b>Dimitris Lyacos</b> (b. 1966) is the author of the <b>Poena Damni</b> trilogy. Renowned for its genre-defying form and the avant-garde combination of themes from literary tradition with elements from ritual, religion, philosophy and anthropology, Lyacos's work reexamines grand narratives in the context of some of the enduring motifs of the Western Canon. Poena Damni, is arranged around a cluster of concepts including the scapegoat, the quest, the return of the dead, redemption, physical suffering, and mental illness. Lyacos's characters are always at a distance from society as fugitives, like the narrator of <b>Z213: EXIT</b>, outcasts in a dystopian hinterland like the characters in <b>With the People from the Bridge</b>, or marooned, like the protagonist of <b>The First Death</b> whose struggle for survival unfolds on a desertlike island. Classified as postmodern and cross-genre, Poena Damni is referred to as one of the salient examples of the fragmentation technique - despite, however, its postmodern affinities, it is also construed in line with the High Modernist tradition setting aside the postmodern playfulness for a serious and earnest handling of the subject.
                        </div>

                        <div class="col-md-6"> <br><br>In 1984, Lyacos set about writing the first installment of what would later become the Poena Damni trilogy. The work, in its current form, developed as a work in progress over the course of thirty years with subsequent editions and excerpts appearing in journals around the world, as well as in dialogue with a diverse range of sister projects it inspired - drama, contemporary dance, video and sculpture installations, photography, opera and contemporary music. The trilogy has been translated into eight languages and has been extensively performed across Europe and the United States. In its unique style that conflates poetry with prose and resisting classification, Poena Damni is one of the leading examples of contemporary writing coming from Europe and the most recent Greek literary work that has achieved international recognition. <br>(BIO COURTESY OF THE BITTER OLEANDER JOURNAL)
                        </div>
                    </div>
--}}
                </div>

            </div>
        </div>
    </section>


<div class="modal fade" id="modal-ger" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modal-label">German</h4>
            </div>
            <div class="modal-body">
                <div class="row mb20">
                    <div class="col-sm-12">
                        <p><b>Dimitris Lyacos</b> ist der Autor von <i>Until the Victim Becomes Our Own</i> und der international gefeierten Trilogie <i>Poena Damni</i>. Sein Werk, das sich den Gattungsgrenzen widersetzt und als „totale Literatur“ bezeichnet wurde, ist in mehr als zwanzig Sprachen übersetzt worden und hat Projekte in zeitgenössischer Musik, Theater, Tanz, bildender Kunst und Fotografie inspiriert.</p>
                        <p>Quer durch Prosa, Lyrik, Drama und Theorie untersucht Lyacos Gewalt und Ritual, Ausgrenzung und Sündenbockmechanismen sowie die sich wandelnden Formen des Göttlichen. <i>Until the Victim Becomes Our Own</i>, konzipiert als „nulltes“ Buch von <i>Poena Damni</i>, zeichnet die Verwandlung des Zwangs von sakrifiziellen und juridischen Strukturen bis zu den kybernetischen Systemen der Gegenwart nach. Das Buch ist auf Italienisch bei Il Saggiatore unter dem Titel <i>Finché la vittima non sarà nostra</i> erschienen und wird am 23. Februar 2027 auf Englisch bei Indirect Books erscheinen, aus dem Griechischen übersetzt von Andrew Barrett.</p>
{{-- OLD GERMAN BIO (replaced Oct 2026)
                        <p>Dimitris Lyacos, Autor der Trilogie <q>Poena Damni</q> (<i>Z213: EXIT</i>, <i>Mit den Menschen von der Brücke</i>, <i>Der erste Tod</i>), zählt zu den bekanntesten und international meistbeachteten Schriftstellern Griechenlands. Die Trilogie wurde bislang in siebzehn Sprachen übersetzt und führt die Bestsellerlisten der zeitgenössischen europäischen Poesie an. <br><br>Im Laufe von 30 Jahren baute Lyacos Poena Damni immer weiter aus, was in zahlreichen Ausgaben resultierte; Auszüge daraus finden sich in allen großen internationalen Literaturzeitschriften, wie das Werk auch eine Vielzahl von Kunstprojekten inspirierte. <br><br>Berühmt für ihre gattungsübergreifende Form und die avantgardistische Verknüpfung von Themen aus der literarischen Tradition mit Elementen aus Religion, Ritualen, Philosophie und Anthropologie, schafft die Trilogie eine Neubewertung der großen Erzählungen im Kontext der klassischen Motive des westlichen literarischen Kanons. Dimitris Lyacos wird nun für den Literaturnobelpreis hoch gehandelt.</p>
--}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-b" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-fra" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modal-label">French</h4>
            </div>
            <div class="modal-body">
                <div class="row mb20">
                    <div class="col-sm-12">
                        <p><b>Dimitris Lyacos</b> est l’auteur de <i>Until the Victim Becomes Our Own</i> et de la trilogie <i>Poena Damni</i>, saluée à l’international. Échappant aux distinctions de genre et qualifiée de «&nbsp;littérature totale&nbsp;», son œuvre a été traduite dans plus de vingt langues et a inspiré des projets en musique contemporaine, théâtre, danse, arts visuels et photographie.</p>
                        <p>Passant de la prose à la poésie, du théâtre à la théorie, Lyacos explore la violence et le rite, l’exclusion et le bouc émissaire, ainsi que les formes changeantes du divin. <i>Until the Victim Becomes Our Own</i>, conçu comme le livre «&nbsp;zéro&nbsp;» de <i>Poena Damni</i>, retrace la transformation de la coercition, des structures sacrificielles et juridiques aux systèmes cybernétiques du présent. Publié en italien par Il Saggiatore sous le titre <i>Finché la vittima non sarà nostra</i>, il paraîtra en anglais le 23 février 2027 chez Indirect Books, dans une traduction du grec d’Andrew Barrett.</p>
{{-- OLD FRENCH BIO (replaced Oct 2026; the modal title above used to say "Spanish")
                        <p><b>Dimitris Lyacos</b> (Δημήτρης Λυάκος) est un poète et un dramaturge grec contemporain1. Il est l'auteur de la trilogie Poena Damni. Reconnue pour sa forme de croisement entre genres et la combinaison avant-gardiste de thèmes de la tradition littéraire avec des éléments du rituel, de la religion, de la philosophie et de l'anthropologie, l'œuvre de Lyacos réexamine de grands récits dans le contexte de certains des motifs durables du Canon occidental. Poena Damni a été écrit dans une période de trente ans2,3, avec les livres individuels révisés et republiés dans différentes éditions et arrangés autour d'un ensemble de concepts comprenant le bouc émissaire, la quête, le retour des morts, le salut religieux, la souffrance physique, la maladie mentale. Les personnages de Lyacos sont toujours à distance de la société en tant que telle3, fugitifs, comme le narrateur de Z213 : EXIT, parias dans un arrière-pays dystopique (comme les personnages dans AVEC LES GENS DU PONT), ou coincés, comme le protagoniste de LA PREMIERE MORT dont la lutte pour survivre se déroule sur une île déserte. Dans l'ensemble, la trilogie a été interprétée comme une «allégorie du malheur» et comparé aux œuvres d'auteurs comme Gabriel Garcia Marquez et Thomas Pynchon4 tout en étant considérée, en même temps, comme l'un des principaux exposants du sublime postmoderne.</p>
--}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-b" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-gre" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modal-label">Greek</h4>
            </div>
            <div class="modal-body">
                <div class="row mb20">
                    <div class="col-sm-12">
                        <p>Ο <b>Δημήτρης Λυάκος</b> είναι ο συγγραφέας του <i>Until the Victim Becomes Our Own</i> και της διεθνώς αναγνωρισμένης τριλογίας <i>Poena Damni</i>. Το έργο του, που υπερβαίνει τις διακρίσεις των λογοτεχνικών ειδών και έχει χαρακτηριστεί «ολική λογοτεχνία», έχει μεταφραστεί σε περισσότερες από είκοσι γλώσσες και έχει εμπνεύσει καλλιτεχνικά έργα στη σύγχρονη μουσική, το θέατρο, τον χορό, τα εικαστικά και τη φωτογραφία.</p>
                        <p>Κινούμενος ανάμεσα στην πρόζα, την ποίηση, το δράμα και τη θεωρία, ο Λυάκος εξετάζει τη βία και την τελετουργία, τον αποκλεισμό και τον αποδιοπομπαίο τράγο, καθώς και τις μεταβαλλόμενες μορφές του θείου. Το <i>Until the Victim Becomes Our Own</i>, σχεδιασμένο ως το «μηδενικό» βιβλίο του <i>Poena Damni</i>, ανιχνεύει τον μετασχηματισμό του καταναγκασμού από τις θυσιαστικές και νομικές δομές στα κυβερνητικά συστήματα του παρόντος. Κυκλοφόρησε στα ιταλικά από τις εκδόσεις Il Saggiatore με τον τίτλο <i>Finché la vittima non sarà nostra</i>, ενώ στα αγγλικά θα κυκλοφορήσει στις 23 Φεβρουαρίου 2027 από τις εκδόσεις Indirect Books, σε μετάφραση του Andrew Barrett από το ελληνικό πρωτότυπο.</p>
{{-- OLD GREEK BIO (replaced Oct 2026)
                        <p>Ο <b> Δημήτρης Λυάκος</b> γεννήθηκε το 1966 στην Αθήνα. Σπούδασε Νομικά στο Πανεπιστήμιο Αθηνών και Φιλοσοφία στο University College London. Η τριλογία του, Poena Damni (Z213:ΕΞΟΔΟΣ, ΜΕ ΤΟΥΣ ΑΝΘΡΩΠΟΥΣ ΑΠΟ ΤΗ ΓΕΦΥΡΑ, Ο ΠΡΩΤΟΣ ΘΑΝΑΤΟΣ) έχει μεταφραστεί σε επτά γλώσσες, με δημοσιεύσεις και παρουσιάσεις σε όλο τον κόσμο. ενώ έχει επίσης αποτελέσει την βάση για ένα ευρύ φάσμα καλλιτεχνικών έργων: θεάτρου και σύγχρονου χορού, video art, ζωγραφικής, multimedia εγκαταστάσεων όπως και έργων σύγχρονης μουσικής. Το Poena Damni κινείται μεταξύ, και στα όρια, των λογοτεχνικών ειδών - από την ιδιότυπα ημερολογιακή πρόζα του Ζ213: EΞΟΔΟΣ, στους ελλειπτικούς μονολόγους του θεατρικού ΜΕ ΤΟΥΣ ΑΝΘΡΩΠΟΥΣ ΑΠΟ ΤΗ ΓΕΦΥΡΑ, στην αυστηρή συμπύκνωση του ποιητικού ιδιώματος του Ο ΠΡΩΤΟΣ ΘΑΝΑΤΟΣ. Η δεύτερη έκδοση του THE FIRST DEATH κυκλοφόρησε το φθινόπωρο του 2017 από τις εκδόσεις Shoestring Press. Η γαλλική μετάφραση του δεύτερου μέρους της τριλογίας καθώς και η δεύτερη αγγλική έκδοση του θα κύκλοφορησουν μέσα στο 2018. Ο Δημήτρης Λυάκος είναι Fellow στο International Writing Program του Πανεπιστημίου της Iowa. </p>
--}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-b" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-ita" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="modal-label">Italian</h4>
            </div>
            <div class="modal-body">
                <div class="row mb20">
                    <div class="col-sm-12">
                        <p><b>Dimitris Lyacos</b> è l’autore di <i>Finché la vittima non sarà nostra</i> e della trilogia <i>Poena Damni</i>, acclamata a livello internazionale. Refrattaria alle distinzioni tra i generi letterari e definita “letteratura totale”, la sua opera è stata tradotta in più di venti lingue e ha ispirato progetti di musica contemporanea, teatro, danza, arti visive e fotografia.</p>
                        <p>Muovendosi tra prosa, poesia, teatro e teoria, Lyacos indaga la violenza e il rito, l’esclusione e il capro espiatorio, e le forme mutevoli del divino. <i>Finché la vittima non sarà nostra</i>, concepito come il libro “zero” di <i>Poena Damni</i>, ripercorre la trasformazione della coercizione dalle strutture sacrificali e giuridiche ai sistemi cibernetici del presente. Pubblicato in Italia dal Saggiatore, uscirà in inglese il 23 febbraio 2027 per Indirect Books con il titolo <i>Until the Victim Becomes Our Own</i>, nella traduzione dal greco di Andrew Barrett.</p>
{{-- OLD ITALIAN BIO (replaced Oct 2026)
                        <p>Lyacos è l’autore della trilogia Poena Damni, uno dei principali esempi della scrittura vanguardista contemporanea europea nonchè la più recente opera letteraria greca ad aver raggiunto un successo internazionale.<br>Il testo è stato sviluppato nel corso di vent’anni con estratti che apparivano come un “lavoro in corso” in riviste di tutto il mondo, fino alla completa finalizzazione nel 2013. La trilogia (Z213: EXIT, Con la gente del ponte, La prima morte) si classifica come genere postmoderno e transversale; tuttavia possiede una struttura ben definita investigando ed esplorando temi classici come il capro espiatorio, il ritorno dei morti, la sofferenza fisica e la malattia mentale. La storia si svolge man mano che il lettore si muove attraverso i diversi stili narrativi dei tre libri: la prosa in forma di diario di Z213: EXIT conduce ai monologhi eliptici de Con la gente del ponte e da lì alla densa immaginazione poetica ne La prima morte. Un viaggio in un mondo mistico e sconosciuto que incrocia e si dispiega attraverso i confini della forma letteraria.<br><br>Traduzioni del testo originale greco sono apparse in sei lingue principali. L’opera, oltre ad essere rappresentata in Europa e Stati Uniti, è stata oggetto di conferenze e ricerche anche sul piano teorico nelle Università di Amsterdam, Trieste e Oxford, per citarne alcune. Una seconda edizione di Z213: EXIT è apparsa in una traduzione rivisitata in inglese nell’autunno del 2016 mentre ad inizi del 2017 è stata pubblicata una nuova traduzione in francese.</p>
--}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-b" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <section>
        <div class="container">
            <div class="row">
                <div id="portfolio" class="grid-layout portfolio-5-columns" data-margin="20">
                    <div data-lightbox="gallery">
                        @foreach($photos as $photo)
                            <div class="portfolio-item img-zoom no-overlay">
                                <div class="portfolio-item-wrap">
                                    <div class="portfolio-image">
                                        <a href="{{asset('images/about/big/'.$photo)}}" data-lightbox="gallery-item" title="{{str_replace('-', ' ', str_replace('.jpg', '', $photo))}}">
                                            <img src="{{asset('images/about/small/'.$photo)}}" alt="{{str_replace('-', ' ', str_replace('.jpg', '', $photo))}}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>



@stop
