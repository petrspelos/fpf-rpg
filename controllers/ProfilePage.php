<?php

    class ProfilePage extends Controller{
        public static function LoadExecute(){
            
            if(isset($_GET['user']))
            {
                // $_GET['user'] je jméno uživatele, jehož profil cheme zobrazit
                // POZOR! jméno nemusí být správně, tak ho musíš zkontrolovat,
                // jestli nejdříve někdo takový je v databázi
            }
            else
            {
                // EASIER PŘÍPAD! (ZAČAL BYCH TÍMHLE)
                // V URL NENÍ SPECIFIKOVÁNO O ČÍ PROFIL SE JEDNÁ
                // Naše default behavior v tomto případě je, že
                // zobrazím profil přihlášeného uživatele.
                // AKA: Když jdeš na stránku FPF-RPG/profile a nenapíšeš tam, čí profile
                // tak je to automaticky tvůj profile.
                // (optional) --- Tohle se dá řešit i redirectem na FPF-RPG/profile?user=JMENO_PRIHLASENEHO_UZIVATELE
                // díky tomu by pak mohl tu adresu kopírovat a poslat kámošovi or whatever... ale to je optional

                // CO BUDEME POTŘEBOVAT? (to je jak kuchařka)
                // self::isLoggedIn();   - Tohle ti vrátí "ID" uživatele v tabulce "users" naší databáze, je to ale docela drahá operace, tak bych to být tebou třeba uložil do nějaké variabilní hodnoty "$userID = " or whatever
                // $username = self::query("SELECT username FROM users WHERE ID=:ID", array(':ID'=>$user_id))[0]['username'];   - Takhle například vytáhneš uživatelské jméno. "username" po SELECT a na konci v hranaté závorce můžou být nahrazeny něčím jiným (podle databázové tabulky "users") může tam třeba být "password" nebo jiná buňka, podle tabulky.
                // do variabilní hodnoty $username vlož výběr z databáze (VYBER položku username Z tabulky users KDE ID = :ID) array(:ID je $user_id <-- variabilní hodnota od někud, použij svojí, nebo rovnou to číslo, jak chceš)[0]<-- první výsledek ['username'] <-- hodnota username

                // self::AddToPage('<h1>Obsah</h1><br>');  - Vloží HTML, který do té funkce vložíš, do obsahu stránky.
                // NEZAPOMEŇ!
                // Můžeš spojovat řetězce. Např: self::AddToPage('<h1>'.$myVar.'</h1>'); - vloží $myVar mezi ty <h1> tagy, takže ti to vypíše do stránky, takhle pošleš ty legit hodnoty.

                // -- Neser se s Designem, prostě to tam napráskej třeba jako <h2> nebo <p>, občas nějaký <img>, your choice --
            }

            // MENŠÍ UKÁZKA FUNGUJÍCÍHO KÓDU
           /* 
            $user_id = self::isLoggedIn();   // <-- uložím si ID (ta funkce vrací ID přihlášeného uživatele)
            $username = self::query("SELECT username FROM users WHERE ID=:ID", array(':ID'=>$user_id))[0]['username'];  // <-- uložím si jeho jméno z databáze

            // Check if a Game exists for this user --- Podívám se, jestli pro něj existuje záznam v "students" tabulce naší databáze
            // To funguje tak, že když máš účet, ještě nemáš staty jako jsou peníze, životy atp. To dostaneš až se poprvé přihlásíš
            // pak se ti taky vytvoří záznam v tabulce "students" --- Podívej se do phpMyAdmin jak to funguje a co tam je za buňky
            // v té tabulce "students" ale je buňka "user_id" která odpovídá "ID" z tabulky "users".

            if(self::query("SELECT * FROM students WHERE user_id=:ID", array(':ID'=>$user_id)))
            {
                // Tady se to dostane, pokud byl nalezen jeho záznam v tabulce "students"
                // Teď zkontroluju, jestli jeho buňka "ending" se náhodou nerovná 0
                // tady je jedno proč to dělám, důležité je, že takhle prostě získám nějakou
                // buňku z jeho záznamu.
                if(self::query("SELECT ending FROM students WHERE user_id=:ID", array(':ID'=>$user_id))[0]['ending'] == 0)
                {
                    // --- ZDE BY POKRAČOVAL KÓD ---
                }
                else
                {
                    // --- ZDE BY POKRAČOVAL KÓD ---
                }
            }
            else
            {
                // TADY SE TO DOSTANE POKUD UŽIVATEL NEMÁ ZÁZNAM V TABULCE "students" -- (to se ti bude hodit)
                // pokud někdo nemá záznam ve "students", nemůžeš vypsat jeho informace na profilu
                // tak v tomto případě můžeš vypsat jenom nějakou chybovou hlášku, nebo něco... your choice
            }*/

            // PŘI TESTOVÁNÍ!
            // NEZAPOMEŇ, ŽE MUSÍŠ BÝT PŘIHLÁŠEN JAKO NĚJAKÝ UŽIVATEL (KLIDNĚ SE MŮŽEŠ ZNOVA REGNOUT, NEBO BÝT DAN/POETRY)
            // POKUD NEBUDEŠ PŘIHLÁŠEN, KICKNE TĚ TO NA LANDING-PAGE
            // NA TU PROFILE STRÁNKU SE DOSTANEŠ JEDINĚ ZADÁNÍM URL, TAKŽE localhost/fpf-slu/profile NEBO NĚCO PODOBNÉHO
            // POKUD BYS DĚLAL I TO S TÍM ZOBRAZENÍM JINÝCH UŽIVATELŮ BYLO BY TO TŘEBA localhost/fpf-slu/profile?user=dan NEBO localhost/fpf-slu/profile?user=spelos
        }

        public static function AddToPage($html){
            echo "<script>AddToPage('$html')</script>";
        }
    }

?>