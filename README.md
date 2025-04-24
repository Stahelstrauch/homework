# Kodu ülesanne 

See on lihtne veebileht, mis pole loomulikut teab mis asjalik, funktsionaalne või veel vähem turvaline. Aga see leht töötab, kõik mis on siin olemas. Kloonige projekt enda arvutisse ja vaadake, mis sellel lehel toimub ja kuidas töötab. Kogu "info" on koodis olemas. 

# Ülesanne

1. Loo uus andmebaas
2. Loo uus tabel vastavalt feedback.csv sisule
3. Kasuta andmebaasi ühenduseks [mysqli](https://www.php.net/manual/en/book.mysqli.php) või [PDO](https://www.php.net/manual/en/pdo.connections.php) prepare lahendust. Proovi luua klass, nagu tunnis tegime. Vihjeks Python ja SQLite ühendus.
4. Kontakt lehelt saadetav info tuleb lisada andmebaasi tabelisse mille sa eelpool tegid. Lisaks kirjutab ka csv faili. Olemasolevat csv faili sisu **ei pea** andmebaasi tabelisse lisama.
5. Admin leht **peab näitama** andmebaasist saadavat infot ja sorteeritud peab olema kuupäeva järgi. Kuupäevad veebilehel on vastavalt eesti keelele.
6. Tagasiside kirjeid peab saama ka kustutada! Muutmist **EI OLE** vaja teha, sest see on "kliendi" kommentaar. Ainult admin peab saama seda teha!

## Lisa
- Proovi logimine teha sessiooni põhiseks. Ainult parooliga.

# GitHub
Kuna õpetaja GitHubi osa jääb külge, siis Visual Code'is Terminalis anna käsklus 
```
git remote remove origin
```
sest õpetaja githubi ilma kutseta lisada ei saa, selle asemel peab olmea teie enda oma. Sellega kaob ära teil Source Control juures värviline pilve ikoon aga sinine **main** jääb alles, mis on lokaalne git.

# Tegija tegemised

*Lõin phpadminis andmebaasi feedback_system.
*Lõin tabeli 5 veeruga.
*Lõin VC faili settings.php.
*Lõin faili settings_ecample.php.
*Lõin mysqli.php faili.
*Täiendasi index.php faili andmebaasi osaga (include:settings, mysqli, class DB).
*Lisaks lisasin submit_feedback.php lubatud failide listi.
*Submit_feedback.php faili täiendasin. Lisasin sql lause, et kirjeid tabelisse lisada.
*Selleks, et submit_feedback leht ja admin leht tunneksid ära selle $db muutuja, tuli paaris kohas ümber teha Locationi suunamised, enne suunas otse, mina panin, et suunaks läbi index.php lehe.
*Admin failis peitsin ära faili lugemise osa ja asendasin selle andmebaasi lugemise osa sql-ga. Kuupäeva vormindamise tegin ära sql lause sees ja sorteerisin kuupäeva järgi nii, et värskemad tagasisided oleks eespool.
*Tabeli body osas tegin forloopi, mille sisse panin siis need andmeread mis pidi täitma. Forloop käib nii palju kordi kui andmeid on.
*Kustutamise jaoks tegin tabelis juurde lahtri pealkirjaga kustuta, trashcan pilt iga rea lõpus. Kui selle ikooni peale hiirega liikuda, siis näeb ära ka id href lingi sees.
*Admin faili ülesosasse kohe peale cookie osa tegin kustutamise osa. Kõigepealt kontrollib, seejärel määrab ära id ja sql lausega kustutab kirje tabelist, mis vastab sellele id-le.
*Sessiooni tegemiseks:
*login failis, kui parool on õige siis algab sessioon, muidu ütleb vale parool.
*logout failis ühendus katkestatakse.
*admin faili sisu kaitsesin sessiooniga, seal saab toimetada ainult siis kui audentimine on tehtud.

