<?php
function pa_get_frontend_lang(){
$pa_texts=Array(
	"ID_NEXT" => "Sekantis",
	"ID_PREV" => "Ankstesnis",
	"ID_NEXT_PAGE" => "Sekantis puslapis",
	"ID_PREV_PAGE" => "Ankstesnis puslapis",
	"ID_ALBUM_NAME" => "Fotoalbumas",
	"ID_PHOTO_DIR" => "Fotografijos",
	"ID_SETUP" => "Nustatymai",
	"ID_HOME" => "Pagrindinis",
	"ID_NAME" => "Vardas",
	"ID_EMAIL" => "E-paštas",
	"ID_NAME_EMAIL" => "Papildomai galite įvesti savo Vardą ir E-pašto adresą",
	"ID_COMMENT_INSTR" => "Parašykite savo nuomonę ir nuspauskite Komentuoti",
	"ID_ADD_COMMENT" => "Komentuoti",
	"ID_ENTER_PASSWD" => "Įveskite Slaptažodį :",
	"ID_DELETE_COMMENT" => "Panaikinti Komentarą",
	"ID_ALBUMS" => "Albumai",
	"ID_SEARCH" => "Paiėška",
	"ID_ERROR_PAGE_MESSAGE" => "Jūs neturite privilegijos peržiūrėti šį puslapį (arba parsisiūsti šią Fotografiją) !",
	"ID_RECIPIENT_NAME" => "Gavėjo Vardas ",
	"ID_RECIPIENT_EMAIL" => "Gavėjo E-paštas ",
	"ID_SENDER_NAME" => "Siuntėjo vardas ",
	"ID_SENDER_EMAIL" => "Siuntėjo E-paštas ",
	"ID_YOUR_MESSAGE" => "Jūsų Žinutė ",
	"ID_WRITE_ECARD" => "Siūsti E-kortelę draugui",
	"ID_FROM" => "Nuo :&nbsp;",
	"ID_TO" => "Kam :&nbsp;",
	"ID_SYS_PAR_SIZ" => "%s KB",
	"ID_SYS_PAR_DIM" => "%s x %s (Plotis x Aukštis)",
	"ID_SYS_PAR_FNM" => "%s",
	"ID_SYS_PAR_FNL" => "<a class=\"me3\" href=\"%s\" target=\"_blank\">%s</a> (nuspauskite nuorodą tam, kad Parsisiūsti orinalųjį failą)",
	"ID_SYS_PAR_DWL" => "<a class=\"me3\" href=\"%s\" target=\"_blank\">(Parsisiūsti orinalųjį failą)</a>",
	"ID_SYS_PAR_CDT" => " %s",
	"ID_SYS_PAR_EXIF_F" => "F %s",
	"ID_SYS_PAR_EXIF_FL" => "%smm",
	"ID_SYS_PAR_EXIF_ISO" => "ISO %s",
	"ID_SYS_PAR_EXIF_EXP_TIME" => "%s sec",
	"ID_MSG_VIEW_COUNT" => "Peržiūrėta : %s kartų",
	"ID_MSG_COMMENT_COUNT" => "Komentarų yra : %s ",
	"ID_LOGIN" => "Prisijungti",
	"ID_LOGOUT" => "Atsijungti",
	"ID_REGISTER" => "Naujo Vartotojo registravimas",
	"ID_REMEMBER" => "Prisiminti",
	"ID_PASSWORD" => "Slaptažodis",
	"ID_PHOTO_DETAILS" => "Fotografijos detalės ",
	"ID_ENTER_ANTISPAM_CODE" => "Įveskite paveikslėlyje matomą tekstą :",
	"ID_NEWEST_PICTURES" => "Naujausios fotografijos",
	"ID_PICTURES" => "Pictures",
	"ID_DID_YOU_MEAN" => "Did you mean: ",
	"ID_ADD_NOTE" => "Add Note",
	"ID_DELETE_ALL_NOTES" => "Delete Notes",
); return $pa_texts; }

function pa_get_backend_lang(){
$pa_texts=Array(
	"ID_ENABLE" => "Leisti",
	"ID_SETUP_MENU" => "Meniu :",
	"ID_SETUP_MENU_MAIN" => "Pagrindiniai Nustatymai",
	"ID_SETUP_MENU_LOGS" => "Apsilankymų įrašai (LOG-ai)",
	"ID_SETUP_MENU_DIRS" => "Galerijos",
	"ID_SETUP_MENU_CACHE" => "Talpyklos Nustatymai",
	"ID_SETUP_MENU_ADMIN" => "Nusiuntimų Vadovas",
	"ID_SETUP_MENU_COMMENTS" => "Komentarai ir Balsavimas",
	"ID_SETUP_MENU_ECARD" => "E-Kortelė",
	"ID_SETUP_MENU_TEXTS" => "Vertimai",
	"ID_SETUP_MENU_ERRORLOG" => "Klaidų įrašai (LOG-ai)",
	"ID_SETUP_MENU_SYSCHECK" => "Sistemos patikrinimas",
	"ID_SETUP_MENU_THUMBNAILS" => "Maži paveiksliukai",
	"ID_SETUP_MENU_THEMES" => "Temos (išvaizda)",
	"ID_SETUP_MENU_USERS" => "Vartotojai",
	"ID_SETUP_MENU_GROUPS" => "Grupės",
	"ID_SETUP_SAVE_CONFIG" => "Įšsaugoti Nustatymus",
	"ID_SETUP_MY_ACCOUNT" => "Mano dėžutė",
	"ID_SETUP_MENU_PARAMS" => "Fotografijų parametrai",
	"ID_SETUP_MENU_PICS" => "Paveiksliukai",
	"ID_SETUP_MENU_SEARCH" => "Search engine",
	"ID_SETUP_THUMBNAILS" => "Mažų paveikslėlių Nustatymai",
	"ID_SETUP_DESC_MAIN" => "Tai Pagrindinių Nustatymų puslapis. Čia galite pakeisti pagrindinius nustatymus, mažų paveikslėlių nustatymus, pakeisti temas bei atlikti kitus pakeitimus. Šis puslapis automatiškai atsiveria instaliavus produktą ir jūs turite atlikti kai kuriuos būtinuosius pakeitimus prieš pradedant naudotis FotoGalerija.",
	"ID_SETUP_DESC_THUMBNAILS" => "Šiame puslapyje galite nustatyti Mažų paveikslėlių ir transformuotų fotonuotraukų dydį ir kokybę. Kiekviena Mažų paveikslėlių grupė atitinka tik vieną kokybės nustatymą. Vartotojas gali pakeisti vieną iš galimų kokybės nustatymų. Išankstinis kokybės nustatymas naudojamas pirmiesiems lankytojams. Jūs galite pridėti naujus kokybės nustatymus arba juos panaikinti. Neįmanoma panaikinti paskutiniojo (likusiojo) nustatymo, todėl šis yra aktyvus ir pagal išankstinius nustatymus - matomas.",
	"ID_SETUP_DESC_THEMES" => "Šiame puslapyje galite vykdyti pakeitimus susijusius su Fotoalbumo išvaizda (Temos).Jūs galite pakeisti Mažų paveiksliukų stilių (flowing - grakštus arba raster - taškinė grafika). Taip pat galite pasirinkti temą, keisti jos spalvų nustatymus, sukurti naujas temas.",
	"ID_SETUP_DESC_LOGS" => "Šiame puslapyje Jūs galite nustatyti, kad būtų registruojamos galerijų fotonuotraukų peržiūros, galite pakeisti registravimams naudojamo failo vardą ir panašiai.",
	"ID_SETUP_DESC_CACHE" => "Šiame puslapyje galite nustatyti ar naudoti Talpyklą ir kokio tipo failams ją naudoti. Taip pat galite pamatyti kiek vietos užima Talpykla ir, esant reikalui, - ją ištrinti.",
	"ID_SETUP_RESET_CONFIG" => "Atkurti Išankstinius Nustatymus",
	"ID_SETUP_DESC_ADMIN" => "Šiame puslapyje galite pridėti į galerijas naujas fotografijas, administruoti fotografijų direktoriją (tam būtina atlikti FTP serverio nustatymus, nurodyti FTP serverio Fotografijų direktoriją). Jeigu šią programą instaliavote /įrašėte naudodami WebIstall, minėti nustatymai greičiausiai nebus reikalingi. Jeigu pakeitėte programos pagrindinę direktoriją, reikia atlikti ir direktorijos nustatymus.",
	"ID_SETUP_DESC_COMMENTS" => "Šiame puslapyje galite atlikti Komentavimų ir Balsavimų nustatymus. Nauji komentarai gali būti įkeliami tik patvirtinus arba tiesiog tik peržiūrimi.",
	"ID_SETUP_DESC_ECARD" => "Šiame puslapyje galite atlikti E-kortelių nustatymus. E-kortelės - tai e-pašto atmaina, kai Jūsų vartotojai gali siūsti E-korteles su Jūsų fotogalerijos nuotraukomis kitiems asmenims.",
	"ID_SETUP_DESC_MODULES" => "On this page you can configure all installed modules of phpAlbum. After enabling of module click on configure to get the configuration screen of the module.",
	"ID_SETUP_ALBUM_DIR" => "Albumo direktorija :",
	"ID_SETUP_ALBUM_DIR_DESC" => "Nurodykite direktoriją, kurioje yra saugojamos fotografijos (reliatyvus kelias nuo failo main.php, pvz: photos/ ).",
	"ID_SETUP_ERRORLOG_DESC" => "Šis puslapis - apie klaidų pranešimus. Tai naudinga tais atvejais jeigu kažkas neveikia. Jūs galite naudoti gedimų registravimui arba pagalbos iš phpAlbum gavimui.",
	"ID_SETUP_TEXTS_DESC" => "Šiame puslapyje Jūs galite pakeisti/papildyti originaliuosius vertimus. Prašome patikrinti Pagrindinius Nustatymus dėl galimų naudoti kalbų. Pakeitimai yra išsaugomi translate_kalba_kodavimas.dat faile (pvz.: translate_lt_utf8.dat).",
	"ID_SETUP_TEXTS_GUIDE" => "Vertimo gidas : Jūs galite pakeisti pageidaujamas frazes. Pakeitimai bus naudojami vietoje originaliojo vertimo.</br>Jūs matote 3 laukelius kiekvienam kalbos elementui. ID kodas yra PILKOS spalvos, jo originalus vertimas - ŽALSVOS spalvos, o pakeitimams skirtas laukelis (esantis žemiau) - tuščias arba užpildytas (GELTONOS spalvos laukelyje - jeigu vertimas neatliktas, BALTAME laukelyje - jeigu vertimas jau yra). <b> Būkite atidūs naudodami %s (ir kitus panašius) kodus bei HTML kodus (&lt;b&gt ir kt). Dėl netinkamai atlikto vertimo gali būti neteisingai atvaizduojami pranešimai arba sutrikti programos darbas !",
	"ID_SETUP_CACHE_DIR" => "Talpyklos direktorija :",
	"ID_SETUP_CACHE_DIR_DESC" => "Nurodykite Talpyklos direktoriją (reliatyvus kelias nuo failo main.php, pvz: cache_123456/ ). Į šią direktoriją turi būti leidžiami įrašyti (žr. privilegijos).",
	"ID_SETUP_MY_ACCOUNT_DESC" => "Čia Jūs galite pakeisti vartotojų duomenis (Vardą, E-paštą, tinklapį, pakeisti prisijungimo Slaptažodį).",
	"ID_SETUP_DESC_USERS" => "Šiame puslapyje Jūs galite vykdyti registruotų vartotojų nustatymų pakeitimus. Jūs galite pašalinti vartotojus, redaguoti jų duomenis. Jeigu pageidaujate sukurti naują vartotoją - tiesiog naudokite funkciją : Registruoti Naują Vartotoją (esant Galerijų puslapyje).",
	"ID_SETUP_DESC_GROUPS" => "Šiame puslapyje Jūs galite vykdyti vartotojų Grupių nustatymų pakeitimus. Vėliau Jūs galėsite priskirti vartotojus šioms grupėms. Jūs galite tam tikrai vartotojų grupei uždrausti peržiūrėti tam tikras galerijas/direktorijas (padaryti jas nematomomis).",
	"ID_SETUP_DESC_DIRS" => "Šiame puslapyje Jūs galite vykdyti Galerijų nustatymų pakeitimus. Jūs galite sukurti/panaikinti galerijų aprašymus, nustatyti vartotojų grupes, parinkti rūšiavimo būdus ir kt.",
	"ID_SETUP_DESC_PICS" => "Šiame puslapyje Jūs galite sukurti aprašymus atskiroms fotografijoms, pakeisti nustatymus.",
	"ID_SETUP_DESC_PARAMS" => "Čia galite sukurti, panaikinti ar pakeisti parametrus, kurie bus atvaizduojami peržiūrint fotografiją (apačioje paveikslėlio/fotografijos). Taip pat yra įmanoma atlikti kiekvienai galerijai/direktorijai individualius nustatymus (tai atliekama Galerijos-e).",
	"ID_SETUP_PASSWORD" => "Slaptažodis :",
	"ID_SETUP_PASSWORD_DESC" => "Sugalvokite ir įveskite Slaptažodį, pakartotinai tą patį Slaptažodį įveskite sekančiame laukelyje. Įvedami duomenys nėra rodomi ir yra užšifruojami. Taigi niekas, be Jūsų, nežinos Jūsų slaptažodžio.",
	"ID_SETUP_LANGUAGE" => "Kalba :",
	"ID_SETUP_LANGUAGE_DESC" => "Pasirinkite kalbą, kuria bus atvaizduojamas tekstas bei paaiškinimai ekrane. Jeigu naudojant turite problemų - įsitikinkite (žr. Sistemos Patikrinimas), kad tinkamai veikia mbstring modulis. Jeigu ne - UTF-8 kodavimas (lietuviškos ą,č,ę,ė,į,š ir kitos raidės) negali būti naudojamas failų ir direktorijų pavadinimams.",
	"ID_SETUP_SYSCHECK_DESC" => "On this page you can check your installation. Critical errors are shown with red color. Yellow color means only warning that some features are not accessible. Green color shows thet it is OK.",
	"ID_SETUP_HOME_URL" => "Tinklapio (Namų) URL :",
	"ID_SETUP_HOME_URL_DESC" => "Įrašykite URL į kurį bus nukreipiama pagal HOME nuorodą.",
	"ID_SETUP_SITE_NAME" => "Tinklapio pavadinimas :",
	"ID_SETUP_SITE_NAME_DESC" => "Įrašykite tinklapio pavadinimą. Jis bus naudojamas kaip šio puslapio antraštė.",
	"ID_SETUP_NEW_DIR_INDIC" => "Naujų failų galerijoje indikatorius :",
	"ID_SETUP_NEW_DIR_INDIC_DESC" => "Kaip ilgai bus naudojama senoji direktorijos ikonėlė atsiradus naujiems failams direktorijoje. Įveskite skaičių Valandomis (pvz: 1 - reikš 1 valanda)",
	"ID_SETUP_FTP_SERVER" => "FTP Serveris :",
	"ID_SETUP_FTP_SERVER_DESC" => "Įveskite Jūsų FTP serverio URL (pvz: ftp.myserver.com)",
	"ID_SETUP_FTP_PHOTO_DIR" => "FTP fotografijų direktorija :",
	"ID_SETUP_FTP_PHOTO_DIR_DESC" => "Tai Fotografijų direktorija Jūsų tinklapio FTP serveryje (pvz: /Albumas/photos_123456/). Simboliai / bei _ (jei toks yra) pradžioje ir gale (žr. pavyzdį) yra BŪTINI !",
	"ID_SETUP_QUALITY_NAME" => "Aprašymas :",
	"ID_SETUP_QUALITY_NAME_DESC" => "Aprašo kokybės nustatymus. Naudojamas Galerijų aprašymuose.",
	"ID_SETUP_QUALITY_THMB" => "Mažų paveikslėlių Dydis / Kokybė",
	"ID_SETUP_QUALITY_THMB_DESC" => "Čia įveskite didžiausią Mažų paveikslėlių dydį (pvz: 100 arba 150). Sekantis parametras - JPEG kompresijos kokybė (rekomenduojami dydžiai ribose nuo 40 iki 90). Šis kokybės nustatymas naudojamas TIKTAI JPG failams (ne PNG ar GIF). Taip pat Jūs galite parinkti <b>Kvadratiniai Maži Paveikslėliai</b> (šiuo atveju visi Mažieji Paveikslėliai bus kvadratiniai ir to paties dydžio).",
	"ID_SETUP_QUALITY_PHOTO" => "Fotografijos (paveikslėlio) Dydis / Kokybė",
	"ID_SETUP_QUALITY_PHOTO_DESC" => "Čia įveskite maksimalų transformuotos (pakeitus išmatavimus) fotografijos dydį (pvz: 100 ar 150). Sekantis parametras - JPEG kompresijos kokybė (paprastai dydžiai ribose nuo 40 to 90). Šis kokybės nustatymas naudojamas TIKTAI JPG failams (ne PNG ar GIF). <b> Naudokite dydį = 0 (nulis) jeigu nereikia pakeisti fotografijos išmatavimų (nereikia transformacijos)</b>",
	"ID_SETUP_DEFAULT_SORT" => "Išankstinis rūšiavimo nustatymas :",
	"ID_SETUP_DEFAULT_SORT_DESC" => "Pasirinkite rūšiavimo nustatymą rūšiuojant Mažuosius paveikslėlius ir Direktorijas. Šis parametras naudojamas rūšiuoti direktorijose, kuriose buvo naudojamas rūšiavimas pagal išankstinius nustatymus.",
	"ID_SETUP_SQUARE_THMB" => "Kvadratiniai Mažieji Paveiksliukai",
	"ID_SETUP_ADD_QUALITY" => "Sukurti naują kokybės nustatymą",
	"ID_SETUP_DELETE_QUALITY" => "Panaikinti šį kokybės nustatymą",
	"ID_SETUP_RESIZE_IF_BIGGER" => "Pakeisti išmatavimus tik jeigu didesni...",
	"ID_SETUP_RESIZE_TO_FIT" => "Pakeisti išmatavimus kad atitiktų :",
	"ID_SETUP_RESIZE_TO_FIT_DESC" => "Pasirinkite kaip bus keičimi fotografijų išmatavimai : proporcingai pagal plotį ir aukštį, tik pagal plotį ar tik pagal aukštį. Taip pat galite nustatyti, kad visos fotografijos bus tokių pat išmatavimų (plotis ir aukštis) arba būtų kvadratinės (x kraštinės).",
	"ID_BOTH_WIDTH_AND_HEIGHT" => "Plotis ir Aukštis (abu)",
	"ID_WIDTH" => "Plotis",
	"ID_HEIGHT" => "Aukštis",
	"ID_SETUP_THEME_SETTINGS" => "Temų nustatymai",
	"ID_SETUP_THEME_COLOR_SETTINGS" => "Temų spalvos",
	"ID_SETUP_THEME_THUMBNAILS_STYLE" => "Mažų paveikslėlių stilius :",
	"ID_SETUP_THEME" => "Tema :",
	"ID_SETUP_THEME_DESC" => "Pasirinkite vieną iš temų. Norėdami sukurti Savo naują Temą, tiesiog nukopijuokite (pvz) Borders direktoriją suteikdami jai Naują pavadinimą (toje pat Themes direktorijoje). Naujoji tema iškart atsiras Meniu (galėsite ją pasirinkti).",
	"ID_SETUP_LOGO_PATH" => "Logotipas yra čia (kelias) :",
	"ID_SETUP_LOGO_PATH_DESC" => "Nurodykite logotipo, kurį pageidaujate naudoti, reliatyvų kelią (nuo failo main.php, pvz: logo_paveiksliukas/)",
	"ID_SETUP_LOGO_STYLE" => "Logotipo stilius :",
	"ID_SETUP_LOGO_STYLE_DESC" => "Pasirinkite kaip bus sukuriamas (sugeneruojams) logotipas. NONE - jeigu nebus logotipo, GRAPHICAL - sugeneruotas grafinis logotipas, TEXT - paprastas tekstinis logotipas (paprasčiausias variantas) ir FILE - naudojamas grafinis logotipas esantis faile.",
	"ID_SETUP_LOGO_TEXT" => "Logotipo tekstas :",
	"ID_SETUP_LOGO_TEXT_DESC" => "Įveskite tekstą grafiniam arba tekstiniam logotipui.",
	"ID_SETUP_THEME_FLOWING_STYLE" => "Grakštus (Flowing) stilius",
	"ID_SETUP_THEME_RASTER_STYLE" => "Taškinės grafikos (Raster) stilius",
	"ID_SETUP_MAX_PHOTO_PER_PAGE" => "Maks. Mažų paveikslėlių skaičius puslapyje :",
	"ID_SETUP_MAX_PHOTO_PER_PAGE_DESC" => "Įveskite maks. rodomų Mažų paveiksl skaičių. Jeigu galerijoje yra daugiau fotografijų, bus naudojamos nuorodos Sekantis bei Ankstesnis galerijos puslapiai.",
	"ID_SETUP_RASTER_SIZE" => "Stulpelis / Eilutė :",
	"ID_SETUP_RASTER_SIZE_DESC" => "Įveskite stulpelių ir eilučių skaičius esant Taškinės grafikos Mažų paveiksliukų peržiūros stiliui.",
	"ID_SETUP_SHOW_FILENAMES" => "Rodyti failų vardus",
	"ID_SETUP_SHOW_FILENAMES_DESC" => "Leisti jeigu pageidaujate rodyti failų vardus (po Mažais paveiksliukais). Vardas bus rodomas jeigu nėra sukurtas Trumpasis aprašymas fotografijai.",
	"ID_SETUP_DISABLE_BOTTOM_NEXTPREV" => "Neleisti puslapio apačioje esančius Sekantis/Ankstesnis (nuorodas)",
	"ID_SETUP_DISABLE_BOTTOM_NEXTPREV_DESC" => "Jeigu čia pažymėsite varnele - puslapio apačioje nebus Sekantis/Ankstesnis nuorodų.",
	"ID_SETUP_COLOR_SETTINGS" => "Spalvų nustatymai :",
	"ID_SETUP_ADD_COLOR_MAP" => "Sukurti naują spalvų paletę",
	"ID_SETUP_COLOR_DELETE" => "Panaikinti šią spalvų paletę",
	"ID_SETUP_COLOR_NAME" => "Spalvų paletės pavadinimas :",
	"ID_SETUP_COLOR_NAME_DESC" => "Tai Spalvų paletės pavadinimas. Jeigu ji nėra paskutinė - galite ją panaikinti.",
	"ID_SETUP_ENABLE_LOGGING" => "Prisijungimas leistinas",
	"ID_SETUP_ENABLE_LOGGING_DESC" => "Jei pažymėsite varnele - prisijungimų registravimas (LOG-ai) bus vykdomas",
	"ID_SETUP_LOGS_FILENAME" => "Registravimų failo pavadinimas (pvz.: registravimai.log)",
	"ID_SETUP_LOGS_FILENAME_DESC" => "Failo vardas, kuriuo bus išsaugojami registravimai",
	"ID_SETUP_LOGS_EXCLUDE" => "Išskyrus frazes :",
	"ID_SETUP_LOGS_EXCLUDE_DESC" => "Įveskite frazes, atskirdami jas kabliataškiu (;). Jūs galite neregistruoti prisijungimų, vykdomų iš tam tikrų HOST-ų. Pvz.: žinodami, kad prisijungimai vyks iš INETO_TIEKEJAS.COM, įveskite frazę : INETO_TIEKEJAS. !!! SVARBU !!! : Jeigu nenusimanote arba neįsitikinę - neįvedinėkite NIEKO !!!",
	"ID_SETUP_CACHE_THUMBNAILS" => "Mažųjų paveiksliukų Talpykla",
	"ID_SETUP_CACHE_RESIZED_PHOTOS" => "Transformuotų fotografijų Talpykla",
	"ID_SETUP_CACHE_THUMBNAILS_DESC" => "Pažymėjus varnele, sukuriant Mažuosius paveiksliukus bus naudojama Talpykla. Tai atlikti REKOMENDUOJAME, nes programa (ir Galerijos tinklapis) veiks sparčiau, bus išvengiama vykdymo klaidų.",
	"ID_SETUP_CACHE_RESIZED_PHOTOS_DESC" => "Pažymėjus varnele, transformuojant fotografijas bus naudojama Talpykla. Tai taip pat naudinga, paspartins programos veikimą, tinklapio puslapių užsikrovimą. Tačiau turėkite omeny, kad transformuoti paveiksliukai Talpykloje užims tam tikrą dydį. Tai svarbu jeigu tinklapio saugojimui paskirtoji erdvė yra ribojama ir nėra didelė.",
	"ID_SETUP_LOGIN" => "Prisijungimas",
	"ID_USERNAME" => "Vartotojas",
	"ID_SETUP_ACT_DIR" => "Esamoji direktorija",
	"ID_SETUP_ACT_DIR_DESC" => "Čia galite pakeisti Esamąją direktoriją jūsų FTP serveryje.",
	"ID_SETUP_UPLOAD_FILE" => "Patalpinti failą :",
	"ID_SETUP_UPLOAD_FILE_DESC" => "Čia galite patalpinti failą į Esamąją direktoriją jūsų FTP serveryje.",
	"ID_UPLOAD" => "Patalpinti",
	"ID_SETUP_MAX_SIZE" => "Maks. dydis :",
	"ID_SETUP_UPLOAD_ZIP_FILE" => "Patalpinamas ZIP-failas :",
	"ID_SETUP_UPLOAD_ZIP_FILE_DESC" => "Čia jūs galite patalpinti ZIP failą į Esamąją direktoriją FTP serveryje. Šis ZIP failas bus išarchyvuotas ir atkurta jame esanti direktorijų struktūra. Jeigu serveryje nėra palaikomas (arba nesate dėl to užtikrinti) ZIP (ar panašus) išarchyvavimas - išarchyvuokite failus savo kompiuteryje ir patalpinkite failus (ir direktorijas) naudodami FTP programa (pvz. : Cute FTP)",
	"ID_UPLOAD_ZIP" => "Patalpinti ZIP",
	"ID_SETUP_CREATE_DIR" => "Sukurti direktoriją",
	"ID_SETUP_CREATE_DIR_DESC" => "Čia galite sukurti naują direktoriją Esamoje FTP serverio direktorijoje.",
	"ID_CREATE" => "Sukurti",
	"ID_FILENAME" => "Failo vardas",
	"ID_SIZE" => "Dydis",
	"ID_IMAGE_SIZE" => "Paveikslėlio dydis",
	"ID_OWNER" => "Savininkas",
	"ID_GROUP" => "Grupė",
	"ID_FUNCTIONS" => "Funkcijos",
	"ID_TIME" => "Laikas",
	"ID_COMMAND" => "Komanda",
	"ID_FILE_DIR" => "Failas / Direktorija",
	"ID_HOST" => "HOST-as",
	"ID_PATH" => "Kelias",
	"ID_ALIAS" => "Pseudonimas",
	"ID_PASSWORDS" => "Slaptažodžiai",
	"ID_SETUP_ENABLE_COMMENTS" => "Leisti Komentuoti",
	"ID_SETUP_ENABLE_COMMENTS_DESC" => "Čia pažymėjus varnele bus leidžiama rašyti komentarus paveiksliukams/fotografijoms",
	"ID_SETUP_COMMENT_QUEUE" => "Patvirtinti eilės dydį ",
	"ID_SETUP_COMMENT_QUEUE_DESC" => "Čia galite nustatyti kiek Komentarų bus matoma (pagrindinai naujausius Komentarus). Nepamirškite periodiškai ištrinti senuosius Komentarus.",
	"ID_SETUP_COMMENT_APPROVING_DESC" => "Čia jūs matote Komentarus, kurie nebuvo patvirtinti arba buvo ištrinti. Patvirtinus nepatvirtintąjį Komentarą, šis bus pašalintas iš šio sąrašo ir atsiras po paveikslėliu. Panaikinus Komentarą iš šio sąrašo, Komentaras bus pašalintas ir nuo paveiksliuko (nebus matomas po paveiksliuku). Būkite ATIDŪS pavirtindami arba pašalindami Komentarus. Pašalinus Komentarą, šis bus pašalinamas NEGRĮŽTAMAI !!!",
	"ID_SETUP_NEW_COMMENTS" => "Nauji Komentarai ",
	"ID_SETUP_ENABLE_ECARD" => "Leisti E-korteles ",
	"ID_SETUP_ENABLE_ECARD_DESC" => "Čia pažymėjus varnele, vartotojamas bus leidžiama siūsti draugams E-korteles su Jūsų fotografija. Tai gražu, tačiau nepamirškite - tai didina jūsų tinklapio mėnesinį TRAFIKĄ. Taigi jeigu jis ribotas ir nedidelis - neleiskite siūsti E-kortelių.",
	"ID_SETUP_ECARD_SUBJECT" => "E-kortelės tema (Subject E-paštui) ",
	"ID_SETUP_ECARD_SUBJECT_DESC" => "Šis tekstas bus naudojamas kaip E-kortelės tema (Subject E-paštui) ",
	"ID_SETUP_ECARD_PICKED_SUBJECT" => "Parinkta Jums !!! E-paštui tema (Subject) ",
	"ID_SETUP_ECARD_PICKED_SUBJECT_DESC" => "Šis tekstas bus naudojamas kaip tema <b> Parinkta Jums !!! </b> išsiunčiant E-kortelės siuntėjui E-paštą",
	"ID_SETUP_ECARD_TEXT" => "E-kortelės (E-pašto) tekstas ",
	"ID_SETUP_ECARD_TEXT_DESC" => "Tai bus žinutė, siunčiama E-paštu. Jūs galite naudoti čia specialias frazes, kurios bus pakeičiamos teisingomis reikšmėmis. (#TO_NAME, #TO_EMAIL, #FROM_NAME, #FROM_EMAIL, #DATE, #TIME, #ECARD_ADRESS, #IMAGE_ADRESS) !!! SVARBU !!! Jei nesate įsitikinęs ar Jums to reikia ir ar atliksite tai teisingai - nieko NEKEISKITE !!!",
	"ID_SETUP_ECARD_PICKED_TEXT" => "Parinkta Jums !!! E-pašto tekstas ",
	"ID_APPROVE" => "Patvirtinti ",
	"ID_DELETE" => "Panaikinti ",
	"ID_TEXT" => "Tekstas ",
	"ID_PICTURE" => "Paveiksliukas ",
	"ID_TYPE" => "Tipas ",
	"ID_ERROR_NUMBER" => "Klaidos Nr. ",
	"ID_ERROR_MESSAGE" => "Klaidos pranešimas",
	"ID_SCRIPT_NAME" => "Scenarijaus (SCRIPT) pavadinimas",
	"ID_LINE" => "Eilutė",
	"ID_SAVE" => "Išsaugoti",
	"ID_SETUP_USERNAME_DESC" => "Įveskite pageidaujamą vartotojo Vardą. Jeigu toks Vardas jau yra naudojamas - apie tai gausite pranešimą.",
	"ID_RETYPE_PASSWORD" => "Slaptažodis (pakartotinai) :",
	"ID_SETUP_EMAIL" => "Jūsų E-pašto adresas :",
	"ID_SETUP_EMAIL_DESC" => "Įveskite savo E-pašto adresą. Jis nebus skelbiamas arba paviešinamas.",
	"ID_SETUP_HOMEPAGE" => "Tinklapis ",
	"ID_SETUP_HOMEPAGE_DESC" => "Įrašykite savo tinklapio adresą (URL). Jis bus atvaizduojamas jeigu Komentuosite paveikslėlius.",
	"ID_SETUP_REGISTER_NEW_USER" => "Registruotis ",
	"ID_THANKS_FOR_REGISTER" => "Sveikiname užsiregistravus ir tapus mūsų tinklapio FotoGalerijos vartotoju !",
	"ID_SETUP_DELETE_ERROROLOG" => "Ištrinti Klaidos registravimą (Errorlog) ",
	"ID_SETUP_ADD_GROUP" => "Sukurti naują vartotojų Grupę ",
	"ID_SETUP_NEW_GROUP_NAME" => "Naujos vartotojų grupės pavadinimas :",
	"ID_SETUP_ADD_GROUP_DESC" => "Įveskite naujos grupės pavadinimą ir nuspauskite šį mygtuką. Nuspaudus bus sukurta nauja vartotojų grupė. Po to galėsite priskirti ją vartotojams ir galerijoms.",
	"ID_SETUP_SHOW_DIRS" => "Rodyti priskirtas FotoGalerijas",
	"ID_SETUP_SHOW_USERS" => "Rodyti Vartotojus",
	"ID_USER" => "Vartotojas",
	"ID_EDIT" => "Redaguoti",
	"ID_ID" => "ID (identifikacinis numeris)",
	"ID_NOT_POSSIBLE" => "Neįmanoma",
	"ID_SETUP_ADD_NEW_PARAM" => "Sukurti naują parametrą",
	"ID_SETUP_ADD_PARAM_DESC" => "Įrašykite naujo Parametro pavadinimą ir parinkite šio parametro tipą.<ul><li><b> Vartotojo reikšmė</b> - vartotojo nustatyta reikšmė (kaip tekstas)</li><li><b> Vartotojo reikšmių sąrašas</b> - vartotojo nustatytos reikšmių sąrašas kiekvienam paveikslėliui</li><li><b> Sisteminė reikšmė</b> - galite nustatyti kaip Išankstinę reikšmę tokiems parametrams kaip : dydis, išmatavimai, sukūrimo data, failo vardas, parsisiuntimo nuoroda ir t.t..</li></ul>",
	"ID_SETUP_PARAM_NAME" => "Parametro pavadinimas :",
	"ID_SETUP_PARAM_NAME_DESC" => "Įrašykite naująjį parametro pavadinimą jeigu norite pakeisti pastarąjį. Nuspausdami panaikinimo/ištrynimo nuorodą, šis parametras bus panaikintas ir tai įtakos paveiksliukų atvaizdavimą. !!! SVARBU !!! Jeigu nesate užtikrinti arba abejojate - NIEKO NEKEISKITE !!!",
	"ID_SETUP_DELETE_PARAM" => "Panaikinti parametrą",
	"ID_SETUP_PARAM_DEFAULT" => "Išankstinio nustatymo reikšmė :",
	"ID_SETUP_PARAM_DEFAULT_DESC" => "Čia galite nustatyti šio parametro Išankstinio nustatymo reikšmę. Ši reikšmė bus naudojama visiems paveikslėliams ir nebus pakeičiama kita fotografijos specifine reikšme.",
	"ID_ALLOW_HTML" => "Leisti HTML kodą",
	"ID_SETUP_PARAM_SYS_DEFAULT" => "Automatiškai nustatyta reikšmė :",
	"ID_SETUP_PARAM_SYS_DEFAULT_DESC" => "Parinkite reikšmę, naudojamą šiam parametrui",
	"ID_SETUP_EDIT_LOV" => "Redaguoti reikšmių sąrašą",
	"ID_SETUP_DELETE_LOV" => "Panaikinti reikšmę",
	"ID_NOT_DEFINED" => "NEAPIBRĖŽTA",
	"ID_ADD_NEW_VALUE" => "Sukurti naują reikšmę",
	"ID_SETUP_ACCOUNT_GROUP_DESC" => "Prašome parinkti grupes, priskiriamas šiai dėžutei",
	"ID_SETUP_GALLERY" => "Galerija : ",
	"ID_SETUP_GALLERY_DESC" => "Pasirinkite Galeriją, kurios nustatymus pageidaujate koreguoti. Jeigu neradote pageidaujamos Galerijos, pabandykite skenuoti paveikslėlių direktorijas (naudokite žemiau esančią nuorodą)",
	"ID_SETUP_ALIAS" => "Pseudonimo vardas : ",
	"ID_SETUP_ALIAS_DESC" => "Įrašykite direktorijos pseudonimo pavadinimą (šis bus naudojamas vietoje tikrojo direktorijos pavadinimo). ",
	"ID_SETUP_DESC" => "Trumpas aprašymas :",
	"ID_SETUP_DESC_DESC" => "Tai šios direktorijos trumpas aprašymas. Aprašymas bus atvaizduojamas šalia direktorijos Mažojo paveikslėlio arba jos Logotipo",
	"ID_SETUP_PIC_DESC_DESC" => "Tai šio paveikslėlio trumpasis aprašymas. Šis aprašymas bus atvaizduojamas šalia paveikslėlio Mažojo paveikslėlio.",
	"ID_SETUP_LONG_DESC" => "Išsamesnis aprašymas :",
	"ID_SETUP_LONG_DESC_DESC" => "Čia rašykite išsamų šios direktorijos aprašymą. Taip pat čia galite įkelti HTML kodą. Naujoms eilutėms sukurti naudokite &lt;br&gt;.",
	"ID_SETUP_PIC_LONG_DESC_DESC" => "Čia rašykite išsamų šio paveikslėlio aprašymą. Jis bus atvaizduojamas kartu su trumpuoju aprašymu po paveikslėliu. Taip pat čia galite įkelti HTML kodą. Naujoms eilutėms sukurti naudokite &lt;br&gt;.",
	"ID_SETUP_SORTING" => "Rūšiavimas :",
	"ID_SETUP_SORTING_DESC" => "Prašome parinkti šiai direktorijai paveikslėlių rūšiavimo būdą. Jeigu parinktas Išankstinis (default) - bus naudojamas toks, koks nurodytas Pagrindiniuose nustatymuose",
	"ID_SETUP_VISIBLE" => "Matoma ",
	"ID_SETUP_VISIBLE_DESC" => "Pasirinkite ar ši direktorija bus matoma ar nematoma (unvisible)",
	"ID_SETUP_ACCESS_RIGHTS" => "Leidimų (access) teisės ",
	"ID_SETUP_GALLERY_GROUP_DESC" => "Prašome parinkti grupes jeigu pageidaujate uždrausti šios galerijos matomumą pažymėtoms grupėms. Jeigu pažymėjimo laukeliai uždrausti - pakeisti neįmanoma, nebent tik atitinkamoje Galerijoje.",
	"ID_SETUP_GALLERY_PARAMS_DESC" => "Parinkite parametrus, kuriuos pageidaujate matyti šalia paveikslėlių. Norėdami daugiau matomų parametrų - sugrįžkite į Fotografijų nustatymus ir ten atlikite reikiamus pakeitimus/papildymus",
	"ID_SETUP_SHOW_CUSTOM_PARAMS" => "Rodyti užsakytus parametrus",
	"ID_SETUP_SHOW_DEFAULT_PARAMS" => "Rodyti Išankstinius parametrus",
	"ID_SETUP_PARAMS_DEFAULT_CUSTOM_DESC" => "Pasirinkite ko pageidautumėte, kad būtų atvaizduojama po kiekviena šios galerijos fotografija : Išankstinių ar Užsakytųjų nustatymų parametrai",
	"ID_SETUP_SHOW_PARAMS" => "Išankstiniai ar Užsakytieji",
	"ID_NO_DEFINED_PARAMS" => "Nėra Užsakytųjų parametrų",
	"ID_SETUP_NEXT_SCAN" => "Sekantis automatinis pilnasis direktorijos skenavimas : %s",
	"ID_SETUP_SCAN_DIRS" => "Skenuoti direktorijas dabar !",
	"ID_DEFAULT_DISPLAYED" => "Atvaizduojami Išankstiniai ",
	"ID_SETUP_PARAM_DEFAULT_DISPLAYED_DESC" => "Pažymėkite varnele jeigu pageidaujate, kad šis parametras būtų atvaizduojamas kaip Išankstinis. Pvz.: kiekvienai galerijai, kuriai nurodyta atvaizduoti Išankstinius parametrus. ",
	"ID_HTML_NOT_ALLOWED" => "HTML kodas yra neleidžiamas",
	"ID_HTML_ALLOWED" => "HTML kodas yra leidžiamas",
	"ID_DEFAULT_VALUE" => "Išankstinio nustatymo reikšmė yra <b>%s</b>",
	"ID_NO_DEFAULT_VALUE" => "Nenustatyta/Nenurodyta Išankstinio nustatymo reikšmė",
	"ID_DEFAULT" => "Išankstiniai ",
	"ID_SETUP_THEME_BORDERS" => "Paveikslėlio ir Mažojo paveikslėlio briaunos",
	"ID_SETUP_THEME_PIC_BORDER_SIZE" => "Paveikslėlio briaunos dydis",
	"ID_SETUP_THEME_THMB_BORDER_SIZE" => "Mažojo paveikslėlio briaunos dydis",
	"ID_SETUP_THEME_DISPLAY_SHADOWS" => "Rodyti šešėlius ",
	"ID_SETUP_THEME_DISPLAY_SHADOWS_DESC" => "Jeigu Tema palaiko, tai rodyti šešėlius atvaizduojant Paveikslėlius ir Mažuosius paveikslėlius",
	"ID_SETUP_THEME_PIC_BORDER_SIZE_DESC" => "Nurodykite Paveikslėlio briaunos plotį ",
	"ID_SETUP_THEME_THMB_BORDER_SIZE_DESC" => "Nurodykite Mažojo Paveikslėlio briaunos plotį ",
	"ID_SETUP_WATERMARK_FILE" => "Vandenženklio failas ",
	"ID_SETUP_WATERMARK_FILE_DESC" => "Nurodykite PNG failą, kuris bus naudojamas kaip vandenženklis modifikuotoms fotografijoms. Jeigu failas nesukurtas, sukurkite jį skaidrų (transparent) ir įkelkite jį į pagrindinę direktoriją (ten pat kur matote failą main.php).",
	"ID_NO_WATERMARK" => "Nenurodytas Vandenženklis ",
	"ID_SETUP_WATERMARK_POSITION" => "Vandenženklio pozicija (ant paveikslėlio) ",
	"ID_SETUP_WATERMARK_POSITION_DESC" => "Nurodykite Vandenženklio poziciją",
	"ID_SETUP_DIR_LOGO_STYLE" => "Galerijos logotipo (ikonėlės) stilius",
	"ID_SETUP_DIR_LOGO_STYLE_DESC" => "Nurodykite kaip bus atvaizduojama Galerija (direktorija) : kaip direktorijos ikonėlė ar kaip vieno iš direktorijoje esančio fotografijos failo (reikės nurodyti papildomai) Mažasis paveikslėlis (nurodyto ar normalaus dydžio).",
	"ID_SETUP_DIR_LOGO_STYLE_LOGO" => "Rodyti direktorijos logotipą ",
	"ID_SETUP_DIR_LOGO_STYLE_PIC1" => "Rodyti paveikslėlio Mažąjį paveikslėlį (tokio paties dydžio)",
	"ID_SETUP_DIR_LOGO_STYLE_PIC2" => "Rodyti paveikslėlio Mažąjį paveikslėlį (kitokio dydžio)",
	"ID_USE_FOR_LOGO" => "Naudoti kaip direktorijos logotipą ",
	"ID_SETUP_ADD_THMB_HEIGHT" => "Papildomai nurodytas Mažojo paveikslėlio aukštis ",
	"ID_SETUP_ADD_THMB_WIDTH" => "Papildomai nurodytas Mažojo paveikslėlio plotis ",
	"ID_SETUP_ADD_THMB_HEIGHT_WIDTH_DESC" => "Padidinkite šią reikšmę jeigu naudojate daugiau eilučių direktorijai arba naudojate Mažųjų paveikslėlių aprašymus. Tai užtikrins daugiau vietos po Mažaisiais paveikslėliais. Tai svarbu jeigu naudojamas grakštus (flowing) stilius, kai naudojant didesnės apimties aprašymo tekstą, gali atsirasti atvaizdavimo problemų.",
	"ID_SETUP_SHARPEN_WITH_PARAM" => "Naudoti Paryškinimą su tokiais parametrais :",
	"ID_SETUP_AMOUNT" => "Kiekis",
	"ID_SETUP_RADIUS" => "Spindulys / Ribos",
	"ID_SETUP_TRESHOLD" => "Slenkstis / Pradžia",
	"ID_SETUP_SHARPEN_DESC" => "Jūs galite nurodyti LEISTI Paryškinimą Mažiesiems paveikslėliams, kurie nekontrastingi po transformacijos. <b> Žinokite, kad tai naudoja daugiau resursų.</b>",
	"ID_SETUP_SHARPEN_THMB" => "Mažojo paveikslėlio Paryškinimas",
	"ID_SETUP_INFO_THMB" => "Rodyti tai po Mažaisiais paveikslėliais",
	"ID_SETUP_INFO_THMB_DESC" => "Pasirinkite kokia informacija bus atvaizduojama po Mažaisiais paveikslėliais",
	"ID_SETUP_INFO_THMB_VIEWS" => "Peržiūrų skaitiklis",
	"ID_SETUP_INFO_THMB_COMMENTS" => "Komentarų skaitiklis",
	"ID_SETUP_INFO_THMB_VOTES" => "Balsavimo suvestinė",
	"ID_SETUP_DATE_FORMAT" => "Datos / Laiko formatas",
	"ID_SETUP_DATE_FORMAT_DESC" => "Nurodykite Datos / Laiko formatą. Jeigu nežinote PHP programavimo kalbos funkcijos DATE() standartų - nieko NEKEISKITE !!!",
	"ID_SETUP_PRIVILEGES" => "Privilegijos ",
	"ID_SETUP_PRIVILEGES_DESC" => "Čia galite nurodyti pasirinktąjai Grupei leistinas atlikti Nustatymų funkcijas. Žailia spalva - funkcija Grupei leidžiama, Raudonoji - neleidžiama. Nuspadžiant nuorodą, pastarosios funkcija atitinkamai tampa leidžiama arba neleidžiama.<br/><br/>Išankstinio nustatymo stulpelyje galite pažymėti kuriai grupei bus priskiriami naujai užsiregistravę vartotojai.",
	"ID_DISABLE_ERROR_LOG" => "Neregistruoti klaidų",
	"ID_SETUP_ENABLE_ANTISPAM" => "Leisti tikrinti ANTISPAM paveikslėlio tekstą. ",
	"ID_SETUP_ENABLE_ANTISPAM_DESC" => "Naudoti ANTISPAM paveikslėlio kodą. Tai leis išvengti kenkėjiškų Registravimųsi, Komentarų bei E-pašto siuntimų.",
	"ID_SETUP_PUBLISH_ONLY_APPROVED" => "Atvaizduoti TIK patvirtintus Komentarus ",
	"ID_SETUP_PUBLISH_ONLY_APPROVED_DESC" => "Čia pažymėjus varnele, Komentarai bus atvaizduojami TIK atlikus patvirtinimą. ",
	"ID_SETUP_THEME_NEWEST_COUNT" => "Rodyti Naujausių paveikslėlių skaitliuką",
	"ID_SETUP_THEME_NEWEST_COUNT_DESC" => "Nurodykite skaičių, kuris apibrėš Naujausių paveikslėlių skaičių, rodomą pirminiame puslapyje. ",
	"ID_SETUP_USE_IPTC_DESC" => "Naudoti fotografijos IPTC arašymą",
	"ID_SETUP_USE_IPTC_DESC_DESC" => "Čia pažymėjus varnele, pirmą kartą skanuojant fotografijas galerijoje, fotografijų Trumpojo ir Išsamaus aprašymams bus naudojamos IPTC reikšmės (Caption ir Headline atitinkamai; žinoma jei tokios reikšmės yra).",
	"ID_IMAGEORIG" => "Parsisiūsti Fotografiją",
	"ID_IMAGEVIEW" => "Paveikslėlio peržiūra",
	"ID_PHOTONOTES" => "PhotoNotes",
	"ID_SEARCHENGINE" => "SearchEngine",
	"ID_SETUP_SHOW_SEARCH_BOX" => "Rodyti paiėškos laukelį",
	"ID_SETUP_SHOW_SEARCH_BOX_DESC" => "Čia pažymėjus bus galima vykdyti fotonuotraukų paiėšką FotoGalerijos puslapiuose. Šiuo metu paiėška veikia tik frazėms, importuotoms iš fotonuotraukų IPTC reikšmių.",
	"ID_SETUP_TRACKING_CODE" => "Pėdsako (Tracking) kodas ",
	"ID_SETUP_TRACKING_CODE_DESC" => "Čia galite patalpinti Javascript pėdsako kodą (pvz.: Google Analytics), kurio rezultatas bus atvaizduojamas kiekviename puslapyje. Jei nežinote - nieko NEKEISKITE (arba palikite tuščią) !!!",
	"ID_SETUP_THEME_CUSTOM_PARAMETERS" => "Custom theme parameters",
	"ID_FILESYSTEM_CHARSET" => "Filesystem Character set",
	"ID_FILESYSTEM_CHARSET_DESC" => "Here you can select character set of your filesystem, in most cases it is ISO8859-1 or UTF-8. If you don't know it, ask your administrator.'",
	"ID_MSG_DIR_NOT_EXISTS" => "Direktorija %s neegzistuoja, nurodykite ją teisingai !!!",
	"ID_MSG_DIR_NOT_WRITABLE" => "Neįmanoma įrašyti į %s direktoriją !!! Pakeiskite direktorijos privilegijas naudodami CHMOD !!!",
	"ID_MSG_FILE_NOT_EXISTS" => "Failas %s nesurastas",
	"ID_FILE_WAS_DELETED" => "Failas %s ištrintas",
	"ID_MSG_SETUP_FTP" => "Tam, kad galėtumėte naudoti Nusiuntimų Vadovą, sugrįžkite į Pagrindinius Nustatymus ir nurodykite ten FTP serverį bei FTP fotografijų direktoriją.",
	"ID_MSG_FTP_SUPPORT" => "FTP nepalaikomas !!! Todėl neįmanoma naudoti Nusiuntimų Vadovą. Paprašykite serverio administratoriaus šios paslaugos (serverio administratorius - tai ne tinklapio administratorius !!!)",
	"ID_MSG_FTP_UNABLE_CONNECT" => "Neįmanoma prisijungti prie serverio %s",
	"ID_MSG_FTP_INVALID_LOGIN" => "Neteisingas vartotojo Vardas arba Slaptažodis !!!",
	"ID_MSG_FTP_PASSIVE_MODE" => "Neįmanoma nustatyti FTP serverio pasyvumo būsenos / režimo",
	"ID_MSG_FTP_UNABLE_CHDIR" => "Neįmanoma pakeisti direktorijos į %s",
	"ID_MSG_FTP_PHOTO_DIR" => "FTP serverio fotografijų direktorija nukreipta į tokią direktoriją, kurioje nėra fotografijų",
	"ID_MSG_FTP_UNABLE_DELETE" => "Neįmanoma panaikinti failo %s FTP serveryje ",
	"ID_MSG_FTP_UNABLE_UPLOAD" => "Neįmanoma nusiūsti failo %s !",
	"ID_MSG_FTP_UNABLE_OPEN_TMP" => "Neįmanoma atidaryti laikinojo failo !",
	"ID_MSG_FTP_UNABLE_MKDIR" => "Neįmanoma sukurti %s direktorijos FTP serveryje !",
	"ID_MSG_FTP_UNABLE_RMDIR" => "Neįmanoma pašalinti %s direktorijos FTP serveryje !",
	"ID_MSG_FTP_NOT_ZIP" => "Tai ne ZIP failas arba toks failo formatas neleistinas !",
	"ID_MSG_FTP_ZIP_UNSUPPORTED" => "ZIP palaikymas neleistinas dėl PHP nustatymų !",
	"ID_MSG_FTP_FILE_UPLOAD_ATTACK" => "Tai galima failų siuntimo ataka !",
	"ID_MSG_PASSWORD_ERROR" => "Pakartotinai įvestas Slaptažodis neatitinka pirmajam Slaptažodžiui. Slaptažodis liko nepakeistas !",
	"ID_MSG_EMAIL_REQUIRED" => "E-pašto adreso įvedimas yra BŪTINAS ! Įrašykite savo E-pašto adresą, jis nebus publikuojamas.",
	"ID_MSG_USERNAME_EXISTS" => "Vartotojas Vardu <b>%s</b> jau egzistuoja ! Pasirinkite kitą Vardą !",
	"ID_MSG_PASSWORD_REQUIRED" => "Slaptažodžio įvedimas yra BŪTINAS ! Įveskite Slaptažodį !",
	"ID_MSG_GROUP_EXISTS" => "Tokia Grupė <b>%s</b> jau yra ! Negalima sukurti Grupių su tokiais pat pavadinimais !",
	"ID_MSG_PARAM_EXISTS" => "Parametras <b>%s</b> jau yra naudojamas ! Pasirinkite kitą parametrą !",
	"ID_MSG_PARAM_MANDATORY" => "Parametras negali būti be pavadinimo ! Įrašykite/sukurkite pavadinimą naujajam parametrui !",
	"ID_MSG_USERNAME_MANDATORY" => "Vartotojo Vardo laukelis negali būti tuščias ! Pasirinkite ir įrašykite vartotojo Vardą !",
	"ID_MSG_MBSTRING_MISSING" => "You are missing MBSTRING module, this is only problematic if you are using different character string encoding for your filesystem and in your language setting. Please correct one of this settings or install/enable MBSTRING PHP module. If you can't do it, just be sure that your directory and file names does not include special characters.",
); return $pa_texts; }