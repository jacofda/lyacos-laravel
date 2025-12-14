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

    <b>Dimitris Lyacos</b> is the author of the <i><b>Poena Damni</b> trilogy (Z213: EXIT, With The People From The Bridge, The First Death)</i>. So far translated into ten languages, Poena Damni developed as a work in progress over the course of thirty years with subsequent editions and excerpts appearing in journals around the world, as well as in dialogue with a diverse range of sister projects it inspired. Renowned for combining, in a genre-defying form, themes from literary tradition with elements from ritual, religion, philosophy and anthropology, the trilogy reexamines grand narratives in the context of some of the enduring motifs of the Western Canon, while, at the same time, being one of the most widely acclaimed avant-garde works published in the new millennium.

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
                        <div class="col-md-6"><b>[LONG BIO]</b><br><br><b>Dimitris Lyacos</b> (b. 1966) is the author of the <b>Poena Damni</b> trilogy. Renowned for its genre-defying form and the avant-garde combination of themes from literary tradition with elements from ritual, religion, philosophy and anthropology, Lyacos's work reexamines grand narratives in the context of some of the enduring motifs of the Western Canon. Poena Damni, is arranged around a cluster of concepts including the scapegoat, the quest, the return of the dead, redemption, physical suffering, and mental illness. Lyacos's characters are always at a distance from society as fugitives, like the narrator of <b>Z213: EXIT</b>, outcasts in a dystopian hinterland like the characters in <b>With the People from the Bridge</b>, or marooned, like the protagonist of <b>The First Death</b> whose struggle for survival unfolds on a desertlike island. Classified as postmodern and cross-genre, Poena Damni is referred to as one of the salient examples of the fragmentation technique - despite, however, its postmodern affinities, it is also construed in line with the High Modernist tradition setting aside the postmodern playfulness for a serious and earnest handling of the subject.
                        </div>

                        <div class="col-md-6"> <br><br>In 1984, Lyacos set about writing the first installment of what would later become the Poena Damni trilogy. The work, in its current form, developed as a work in progress over the course of thirty years with subsequent editions and excerpts appearing in journals around the world, as well as in dialogue with a diverse range of sister projects it inspired - drama, contemporary dance, video and sculpture installations, photography, opera and contemporary music. The trilogy has been translated into eight languages and has been extensively performed across Europe and the United States. In its unique style that conflates poetry with prose and resisting classification, Poena Damni is one of the leading examples of contemporary writing coming from Europe and the most recent Greek literary work that has achieved international recognition. <br>(BIO COURTESY OF THE BITTER OLEANDER JOURNAL)
                        </div>
                    </div>
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
                        <p>Dimitris Lyacos, Autor der Trilogie <q>Poena Damni</q> (<i>Z213: EXIT</i>, <i>Mit den Menschen von der Brücke</i>, <i>Der erste Tod</i>), zählt zu den bekanntesten und international meistbeachteten Schriftstellern Griechenlands. Die Trilogie wurde bislang in siebzehn Sprachen übersetzt und führt die Bestsellerlisten der zeitgenössischen europäischen Poesie an. <br><br>Im Laufe von 30 Jahren baute Lyacos Poena Damni immer weiter aus, was in zahlreichen Ausgaben resultierte; Auszüge daraus finden sich in allen großen internationalen Literaturzeitschriften, wie das Werk auch eine Vielzahl von Kunstprojekten inspirierte. <br><br>Berühmt für ihre gattungsübergreifende Form und die avantgardistische Verknüpfung von Themen aus der literarischen Tradition mit Elementen aus Religion, Ritualen, Philosophie und Anthropologie, schafft die Trilogie eine Neubewertung der großen Erzählungen im Kontext der klassischen Motive des westlichen literarischen Kanons. Dimitris Lyacos wird nun für den Literaturnobelpreis hoch gehandelt.</p>
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
                <h4 class="modal-title" id="modal-label">Spanish</h4>
            </div>
            <div class="modal-body">
                <div class="row mb20">
                    <div class="col-sm-12">
                        <p><b>Dimitris Lyacos</b> (Δημήτρης Λυάκος) est un poète et un dramaturge grec contemporain1. Il est l'auteur de la trilogie Poena Damni. Reconnue pour sa forme de croisement entre genres et la combinaison avant-gardiste de thèmes de la tradition littéraire avec des éléments du rituel, de la religion, de la philosophie et de l'anthropologie, l'œuvre de Lyacos réexamine de grands récits dans le contexte de certains des motifs durables du Canon occidental. Poena Damni a été écrit dans une période de trente ans2,3, avec les livres individuels révisés et republiés dans différentes éditions et arrangés autour d'un ensemble de concepts comprenant le bouc émissaire, la quête, le retour des morts, le salut religieux, la souffrance physique, la maladie mentale. Les personnages de Lyacos sont toujours à distance de la société en tant que telle3, fugitifs, comme le narrateur de Z213 : EXIT, parias dans un arrière-pays dystopique (comme les personnages dans AVEC LES GENS DU PONT), ou coincés, comme le protagoniste de LA PREMIERE MORT dont la lutte pour survivre se déroule sur une île déserte. Dans l'ensemble, la trilogie a été interprétée comme une «allégorie du malheur» et comparé aux œuvres d'auteurs comme Gabriel Garcia Marquez et Thomas Pynchon4 tout en étant considérée, en même temps, comme l'un des principaux exposants du sublime postmoderne.</p>
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
                        <p>Ο <b> Δημήτρης Λυάκος</b> γεννήθηκε το 1966 στην Αθήνα. Σπούδασε Νομικά στο Πανεπιστήμιο Αθηνών και Φιλοσοφία στο University College London. Η τριλογία του, Poena Damni (Z213:ΕΞΟΔΟΣ, ΜΕ ΤΟΥΣ ΑΝΘΡΩΠΟΥΣ ΑΠΟ ΤΗ ΓΕΦΥΡΑ, Ο ΠΡΩΤΟΣ ΘΑΝΑΤΟΣ) έχει μεταφραστεί σε επτά γλώσσες, με δημοσιεύσεις και παρουσιάσεις σε όλο τον κόσμο. ενώ έχει επίσης αποτελέσει την βάση για ένα ευρύ φάσμα καλλιτεχνικών έργων: θεάτρου και σύγχρονου χορού, video art, ζωγραφικής, multimedia εγκαταστάσεων όπως και έργων σύγχρονης μουσικής. Το Poena Damni κινείται μεταξύ, και στα όρια, των λογοτεχνικών ειδών - από την ιδιότυπα ημερολογιακή πρόζα του Ζ213: EΞΟΔΟΣ, στους ελλειπτικούς μονολόγους του θεατρικού ΜΕ ΤΟΥΣ ΑΝΘΡΩΠΟΥΣ ΑΠΟ ΤΗ ΓΕΦΥΡΑ, στην αυστηρή συμπύκνωση του ποιητικού ιδιώματος του Ο ΠΡΩΤΟΣ ΘΑΝΑΤΟΣ. Η δεύτερη έκδοση του THE FIRST DEATH κυκλοφόρησε το φθινόπωρο του 2017 από τις εκδόσεις Shoestring Press. Η γαλλική μετάφραση του δεύτερου μέρους της τριλογίας καθώς και η δεύτερη αγγλική έκδοση του θα κύκλοφορησουν μέσα στο 2018. Ο Δημήτρης Λυάκος είναι Fellow στο International Writing Program του Πανεπιστημίου της Iowa. </p>
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
                        <p>Lyacos è l’autore della trilogia Poena Damni, uno dei principali esempi della scrittura vanguardista contemporanea europea nonchè la più recente opera letteraria greca ad aver raggiunto un successo internazionale.<br>Il testo è stato sviluppato nel corso di vent’anni con estratti che apparivano come un “lavoro in corso” in riviste di tutto il mondo, fino alla completa finalizzazione nel 2013. La trilogia (Z213: EXIT, Con la gente del ponte, La prima morte) si classifica come genere postmoderno e transversale; tuttavia possiede una struttura ben definita investigando ed esplorando temi classici come il capro espiatorio, il ritorno dei morti, la sofferenza fisica e la malattia mentale. La storia si svolge man mano che il lettore si muove attraverso i diversi stili narrativi dei tre libri: la prosa in forma di diario di Z213: EXIT conduce ai monologhi eliptici de Con la gente del ponte e da lì alla densa immaginazione poetica ne La prima morte. Un viaggio in un mondo mistico e sconosciuto que incrocia e si dispiega attraverso i confini della forma letteraria.<br><br>Traduzioni del testo originale greco sono apparse in sei lingue principali. L’opera, oltre ad essere rappresentata in Europa e Stati Uniti, è stata oggetto di conferenze e ricerche anche sul piano teorico nelle Università di Amsterdam, Trieste e Oxford, per citarne alcune. Una seconda edizione di Z213: EXIT è apparsa in una traduzione rivisitata in inglese nell’autunno del 2016 mentre ad inizi del 2017 è stata pubblicata una nuova traduzione in francese.</p>
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
