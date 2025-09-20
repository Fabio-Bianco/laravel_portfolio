Portfolio Progetti – Laravel Backoffice + Guest Area
Descrizione

Questo progetto è un portfolio interattivo sviluppato con Laravel 12 e pensato per mostrare competenze sia tecniche sia architetturali.
L’applicazione implementa un sistema di gestione progetti con backoffice e livelli di accesso differenziati.

L’obiettivo è dimostrare la padronanza di concetti chiave come:

CRUD completo

Autenticazione e autorizzazione multi-ruolo

Middleware personalizzati

Gestione seeders e popolamento DB

Struttura chiara tra frontend guest e backend admin

Ruoli e livelli di accesso
👤 Guest (anonimo)

Può visualizzare liberamente la lista dei progetti.

Non è necessaria alcuna registrazione.

Obiettivo: simulare la navigazione pubblica di un portfolio.

👥 User registrato

Deve autenticarsi con email e password.

Può visualizzare i progetti.

Ha accesso a funzionalità aggiuntive, pensate per mostrare competenze avanzate:

Sezione personale con CV scaricabile

Possibilità di accedere a contenuti riservati

Form di contatto autenticato

👨‍💼 Admin

Ha accesso al backoffice protetto.

Può creare, modificare ed eliminare progetti.

Gestisce i contenuti mostrati agli altri ruoli.

Accesso consentito solo agli utenti con campo is_admin = 1.

Credenziali demo

Per permettere una correzione/test immediata:

Admin

Email: admin@portfolio.it

Password: Password123!

User demo

Email: user@portfolio.it

Password: Password123!

Guest

Nessuna autenticazione richiesta.

Tecnologie utilizzate

Laravel 12 (framework backend)

MySQL (database relazionale)

Breeze + Bootstrap (autenticazione e interfaccia base)

Seeder + Faker (popolamento dati fittizi)

Architettura

routes/web.php → definizione rotte pubbliche e protette

app/Http/Controllers/Admin → gestione CRUD progetti

app/Http/Middleware → middleware personalizzati per is_admin e is_user

resources/views/guest → sezione pubblica/registrati

resources/views/admin → backoffice CRUD

Note didattiche

Nella realtà un portfolio pubblico non richiederebbe login per la sola consultazione.

Qui la gestione multi-ruolo è stata introdotta volutamente per dimostrare competenze avanzate in autenticazione/autorizzazione.

In fase di colloquio questo approccio mostra di comprendere:

Differenza tra autenticazione (chi sei) e autorizzazione (cosa puoi fare)

Strutturazione di un sistema scalabile con ruoli multipli

Gestione coerente di middleware e permessi