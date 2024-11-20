# Raport la lucrarea de laborator nr. 4

## Descrierea lucrării de laborator
Familiarizarea cu elementele de bază ale creării și gestionării formularelor în Laravel.
Deprinderea mecanismelor de validare a datelor pe server, utilizarea regulilor de validare predefinite și personalizate, precum și învățarea gestionării erorilor și asigurarea securității datelor.

## Documentație scurtă a proiectului

### Descrierea proiectului
Aplicația Laravel oferă acum funcționalități pentru gestionarea sarcinilor:

- Vizualizarea listei de sarcini
- Adăugarea unei sarcini noi
- Editarea unei sarcini
- Vizualizarea detaliilor unei sarcini
- Ștergerea unei sarcini
- Validarea datelor de intrare pentru a preveni injectarea de cod SQL şi alte vulner
- Gestiunea erorilor
- Securitatea datelor

### Interfața aplicației
Interfața aplicației este simplă și intuitivă. Toate funcțiile sunt disponibile pe pagina „Tasks”, unde utilizatorii pot efectua cu ușurință acțiunile necesare pentru fiecare sarcină.

### Structura directoarelor și fișierelor

Aplicația Laravel conține următoarele directoare și fișiere:

- Controlerele aplicației.
- Paginile pentru vizualizarea, editarea, ștergerea și crearea sarcinilor în directorul `resources/views/tasks`.
- Modelele bazei de date.
- Fabricile pentru generarea automată a datelor de test, în `database/factories`.
- Migrațiile pentru crearea structurii bazei de date, în `database/migrations`.
- Seed-urile pentru popularea bazei cu date de test, în `database/seeders`.
- Rutele aplicației.
- Requests pentru validarea datelor de intrare, în `app/Http/Requests`.

##  Exemple de utilizare a proiectului cu atașarea capturilor de ecran sau a fragmentelor de cod
- exemplu de pagina principala 
![pagina principala care afiseaza toate sarcinile](screenshots/Captură%20de%20ecran%202024-11-20%20115812.png)

- exemplu de pagina cu creare de sarcini noua
![pagina de creare a unei noi sarcini](screenshots/Captură%20de%20ecran%202024-11-20%20115714.png)

- exemplu de pagina cu editarea unei sarcini existente
![pagina de editare a unei sarcini existente](screenshots/Captură%20de%20ecran%202024-11-20%20115854.png)

##  Răspunsuri la întrebările de control
### Ce este validarea datelor și de ce este necesară?
Validarea datelor este procesul de verificare a corectitudinii și conformității datelor introduse de utilizatori într-un formular, înainte ca acestea să fie procesate sau stocate în baza de date. 
Este necesară pentru:
- Asigurarea integrității datelor: Verifică dacă datele sunt complete și corecte.
- Prevenirea erorilor: Evită salvarea unor informații greșite sau incomplete.
- Securitate: Protejează aplicația de atacuri care încearcă să exploateze date incorecte sau malițioase.

### Cum se asigură protecția formularului împotriva atacurilor CSRF în Laravel?
În Laravel, pentru prevenirea atacurilor CSRF (Cross-Site Request Forgery), se utilizează un mecanism de protecție prin token CSRF. Acesta permite prevenirea trimiterii de date falsificate către server.

Laravel adaugă automat tokenul CSRF în fiecare formular creat cu ajutorul Blade, folosind directiva @csrf. Acest token este verificat la fiecare cerere POST pentru a se asigura că cererea provine din aplicația ta și nu de la un atacator.

### Cum se creează și utilizează clasele personalizate de cerere (Request) în Laravel?
Clasele personalizate de cerere (Request) sunt folosite pentru a valida datele și a aplica logică de autorizare înainte de a ajunge în controller. Acestea sunt create cu comanda php artisan make:request.
În această clasă, poți defini regulile de validare și metoda de autorizare

### Cum se protejează datele împotriva atacurilor XSS la afișarea în vizualizare?
Pentru a preveni atacurile XSS (Cross-Site Scripting), Laravel escapează automat datele atunci când le afișezi în vizualizări cu {{ }}. Astfel, orice conținut introdus este curățat pentru a preveni injecțiile.


##  Lista surselor utilizate
- CSRF Protection: https://laravel.com/docs/10.x/csrf
- Practici de securitate: https://codingmall.com/knowledge-base/25-global/10545-cum-m-pot-asigura-c-aplicaia-mea-laravel-respect-cele-mai-bune-practici-de-securitate
- Laravel Documentation: https://laravel.com/docs/10.x
- Laravel Request Validation: https://laravel.com/docs/10.x/validation#creating-form-requests
- Laravel CSRF Token: https://laravel.com/docs/10.x/csrf#csrf-tokens
