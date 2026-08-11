## LO Storage potrebbe non funzionare in quanto laravel quando lanciamo il sito sul browser elimina le immagini che vi sono all'interno della cartella public/storage/img che si trovano all'interno di storage/public/img. Le immagini vengono ignorate quando faccio un clone della mia repository, genero la key, scrivo il database, faccio le migrazioni. Nel gitignore infatti trovo la voce ignora ciò che trovi in public e private. Infatti la cartella storage contiene app che contiene public img con le immagini all'interno ignorate

#FORTIFY
- E' un pacchetto (libreria) che è un insieme di logiche, funzioni , classi 
first party di Laravel cioè una libreria specifica per laravel che serve a gestire l'autenticazione
    - per autenticazione intendiamo un sistema di accesso e registrazione al nostro sito (login).

- Installazione => Seguiremo tutti i procedimenti passo passo. Frontend agnostic cioè non gestisce il frontend ma solo l'implementazione backend cioè le logiche e sarà lo sviluppatore ad integrare la parte front-end.
(laravel- 13x- fortify)
- scrivere composer require laravel/fortify 


(installazione delle dipendenze di PHP)
-php artisan fortify:install
    - Abbiamo reso disponibili al nostro progetto dei file di configurazione e delle logiche di fortify che già c'erano nella cartella vendor ma esse sono ignorate dal git ignore Quindi per effettuare delle modifiche al comportamento di base di fortify dobbiamo per forza usare questo comando per sovrascrivere una serie di servizi, migrazioni, file contenuti nella cartella vendor/laravel/fortify.
- php artisan migrate
    - Per lanciare la nuova migrazione che il comando precedente ci ha pubblicato

Se cloniamo un progetto, non lanciamo tutti questi comandi ma solo il composer install

- per capire la rotta che ci cha creato fortify per rimandarci alla vista auth.register in cui ho inserito il form di registrazione, lancio il comando php artisan route:list

- Registrazione
    - Andiamo a definire nel FortifyServiceProvider la logica per poter visualizzare il form di registrazione
    - Copiamo la logica di questo link => https://laravel.com/docs/13.x/fortify#registration
    - Creiamo la cartella auth con dentro il file register.blade.php
- Utilizziamo il comando php artisan route:list per vedere le rotte del nostro progetto e recuperare quelle di Fortify

- Una volta che io clicco sul pulsante registrati, ho creato l'utente nel database ed entro nella sessione dell'utente registrati, quindi nella navbar il list item registrati non ci manda più al form finchè rimango nella sessione e con i cookie annullo l'operato perchè non possiamo registrarci se siamo già in sessione, devo compiere l'operazione di logout e poi magari accedere con il login normale. Andiamo a crearci un tasto che fa il logout. Torniamo sulle liste delle rotte di fortify che ha una rotta di tipo post che si chiama logout che fa sì che compiendo un'operazione all'interno del server perchè il server sta indicando al nostro browser che tutte le richieste portano con se l'informazione che la sta facendo l'utente in sessione registrato. Quindi dobbiamo fare una rotta di tipo post che lancia la rotta logout di fortify

- Logout
 - Utilizziamo la rotta POST fornita da Fortify per creare un form che mi permetta di staccare la sessione dell'utente registrato

 - Accesso (Login)
     -Andiamo a definire nel FortifyServiceProvider la logica per poter visualizzare il form di accesso
      - Copiamo la logica di questo link => https://laravel.com/docs/13.x/fortify#authentication
      - Creiamo la cartella auth con dentro il file login.blade.php

## Middleware
- I middleware sono delle logiche che io scelgo di interporre a determinate richieste
- 'auth' è l'alias del middleware che controlla se l'utente è autenticato. Ricordiamo che le richieste http vengono gestite dalle rotte


## CRUD
C => Create
R => Read
U => Update
D => Delete

Sono le 4 operazioni di base che si possono effettuare in un Database. Laravel sa che il suo framework è utilizzato spesso per le operazioni CRUD e quindi ci fornisce classi e modelli che definisce ad esempio una tabella articles con i diversi articoli da popolare in un blog. Creiamo un modello Article ma dobbiamo creare prima la migrazione e poi il modello e quindi utilizziamo php artisan make:model Article -mcr

- m => migrazione
- c => controller
- r => risorse del controller per sfruttare le operazioni CRUD

- Scriviamo la migrazione con la struttura della nostra tabella
- Andiamo nel modello a definire i fillable
- Andiamo a definire le funzioni del nostro controller collegandolo alle rotte 

## Update

- Creare un form pre-compilato con i dati dell'articolo che vogliamo aggiornare
- Creare una funzione che mi aggiorni l'articolo da modificare;

## Delete
-- creare una funzione per cancellare un articolo


## Relazione One to Many
Molto importante perchè vado ad inserire le foreign key cioè ad esempio il ID e user ID perchè devo sapere chi ha aggiunto un prodotto e ogni prodotto appartiene solo e soltanto ad un utente;

- Aggiungere la foreign key  all'interno della tabella child della relazione one to many. (FK) attraverso una migration. La tabella child è quella che definisce la parte "Many" della relazione, mentre la tabella parent è quella che definisce la parte "One" della relazione.
    - php artisan make:migration add_user_id_column_to_products_table

- Istruire i nostri modelli relazionali che interagiscono fra di loro

-- Traversalmodel: dal modello mproduct, attraverso il modello user da cui vado a recuperare le informazioni del nome. Si intende la capacità dei modelli di recuperare le innformazioni dei modelli relazionati

## Relazioni Many to Many: N to N 

- Ci creiamo due modelli da mettere in relazione N - N
- Creare la migrazione per i modelli
- Creare la migrazione per la tabella pivot
    -  php artisan make:migration create_article_tag_table
    - La tabella pivot si crea mettendo i nomi dei modelli al singolare minuscolo in ordine alfabetico
- Inserisco nella migrazione le due Foreign Key
- Istruire i modelli alla relazione many to many


## LIVEWIRE
- Un framework per creare delle UI (User Interface) reattive rimanendo nel linguaggio PHP

## Installazione

- composer require livewire/livewire
- php artisan make:livewire counter

## Creazione di un componente
- php artisan make:livewire nome-componente