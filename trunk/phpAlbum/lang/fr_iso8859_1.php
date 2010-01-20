<?php
function pa_get_frontend_lang(){
$pa_texts=Array(
	"ID_NEXT" => "suivante",
	"ID_PREV" => "pr�d�dente",
	"ID_NEXT_PAGE" => "page suivante",
	"ID_PREV_PAGE" => "page pr�c�dente",
	"ID_ALBUM_NAME" => "phpAlbum",
	"ID_PHOTO_DIR" => "Photos",
	"ID_SETUP" => "config",
	"ID_HOME" => "Index",
	"ID_NAME" => "Nom",
	"ID_EMAIL" => "e-mail",
	"ID_NAME_EMAIL" => "Vous pouvez entrer votre nom et votre adresse mail",
	"ID_COMMENT_INSTR" => "Entrez votre messages et cliquez sur Ajouter un commentaire",
	"ID_ADD_COMMENT" => "Ajouter un commentaire",
	"ID_ENTER_PASSWD" => "Mot de passe",
	"ID_DELETE_COMMENT" => "Effacer commentaire",
	"ID_ALBUMS" => "Albums",
	"ID_SEARCH" => "Recherche",
	"ID_ERROR_PAGE_MESSAGE" => "Vous n'�tes pas autoris�s � afficher cette page!",
	"ID_RECIPIENT_NAME" => "Nom du destinataire",
	"ID_RECIPIENT_EMAIL" => "Adresse email du destinataire",
	"ID_SENDER_NAME" => "Nom de l'expediteur",
	"ID_SENDER_EMAIL" => "Adresse email de l'expediteur",
	"ID_YOUR_MESSAGE" => "Votre message",
	"ID_WRITE_ECARD" => "Ecrire une e-carte",
	"ID_FROM" => "Depuis:&nbsp;",
	"ID_TO" => "Vers:&nbsp;",
	"ID_SYS_PAR_SIZ" => "%s KB",
	"ID_SYS_PAR_DIM" => "%s x %s ( L x H )",
	"ID_SYS_PAR_FNM" => "%s",
	"ID_SYS_PAR_FNL" => "<a class=\"me3\" href=\"%s\" target=\"_blank\">%s</a> (cliquez pour t�l�charger le fichier original)",
	"ID_SYS_PAR_DWL" => "<a class=\"me3\" href=\"%s\" target=\"_blank\">(cliquez pour t�l�charger le fichier original)</a>",
	"ID_SYS_PAR_CDT" => "%s",
	"ID_SYS_PAR_EXIF_F" => "F %s",
	"ID_SYS_PAR_EXIF_FL" => "%smm",
	"ID_SYS_PAR_EXIF_ISO" => "ISO %s",
	"ID_SYS_PAR_EXIF_EXP_TIME" => "%s sec",
	"ID_MSG_VIEW_COUNT" => "Vue: %s fois",
	"ID_MSG_COMMENT_COUNT" => "Commentaires: %s",
	"ID_LOGIN" => "login",
	"ID_LOGOUT" => "logout",
	"ID_REGISTER" => "Enregistrer nouvel utilisateur",
	"ID_REMEMBER" => "M�moriser",
	"ID_PASSWORD" => "Mot de passe",
	"ID_PHOTO_DETAILS" => "D�tails de la photo",
	"ID_ENTER_ANTISPAM_CODE" => "Entrez le code anti-spam",
	"ID_NEWEST_PICTURES" => "Derni�res photos",
	"ID_PICTURES" => "Pictures",
	"ID_DID_YOU_MEAN" => "Did you mean: ",
	"ID_ADD_NOTE" => "Add Note",
	"ID_DELETE_ALL_NOTES" => "Delete Notes",
); return $pa_texts; }

function pa_get_backend_lang(){
$pa_texts=Array(
	"ID_ENABLE" => "Activer",
	"ID_SETUP_MENU" => "Menu:",
	"ID_SETUP_MENU_MAIN" => "Configuration g�n�rale",
	"ID_SETUP_MENU_LOGS" => "Log des acc�s",
	"ID_SETUP_MENU_DIRS" => "G�rer les galeries",
	"ID_SETUP_MENU_CACHE" => "Options du cache",
	"ID_SETUP_MENU_ADMIN" => "Utilitaire FTP",
	"ID_SETUP_MENU_COMMENTS" => "Commentaires et votes",
	"ID_SETUP_MENU_ECARD" => "e-cartes",
	"ID_SETUP_MENU_TEXTS" => "Traductions",
	"ID_SETUP_MENU_ERRORLOG" => "Log des erreurs",
	"ID_SETUP_MENU_SYSCHECK" => "Check syst�me",
	"ID_SETUP_MENU_THUMBNAILS" => "Miniatures",
	"ID_SETUP_MENU_THEMES" => "Th�mes",
	"ID_SETUP_MENU_USERS" => "Utilisateurs",
	"ID_SETUP_MENU_GROUPS" => "Groupes",
	"ID_SETUP_SAVE_CONFIG" => "Sauver config",
	"ID_SETUP_MY_ACCOUNT" => "Mon compte",
	"ID_SETUP_MENU_PARAMS" => "Param�tres photos",
	"ID_SETUP_MENU_PICS" => "G�rer les photos",
	"ID_SETUP_MENU_SEARCH" => "Search engine",
	"ID_SETUP_THUMBNAILS" => "Groupe de param�tres",
	"ID_SETUP_DESC_MAIN" => "Ceci est la page de configuration g�n�rale de phpAlbum. Cette page est charg�e automatiquement apr�s l'installation et vous devez l'�diter avant d'utiliser phpAlbum.",
	"ID_SETUP_DESC_THUMBNAILS" => "Sur cette page vous pouvez �diter la taille et la qualit� des photos et miniatures. Chaque groupe d'options repr�sente une configuration de qualit�. L'utilisateur peut alors modifier les param�tres de qualit� comme il l'entend. Vous pouvez ajouter ou supprimer des groupes de param�tres � votre convenance, il n'est pas possible de supprimer tous les groupes de param�tres.",
	"ID_SETUP_DESC_THEMES" => "Sur cette page vous pouvez �diter les param�tres d'affichage de votre album. Vous pouvez choisir le style des miniatures fluide ou fix�. Vous pouvez �galement choisir votre th�me et les couleurs.",
	"ID_SETUP_DESC_LOGS" => "Sur cette page vous pouvez activer l'enregistrement des acc�s � vos galeries. Vous pouvez �galement changer le nom de votre fichier log afin que personne ne puisse y acc�der. Enfin, vous pouvez entrer des noms � ignorer afin de ne pas compter le passage de certaines personnes.",
	"ID_SETUP_DESC_CACHE" => "Dans cette section vous pouvez param�trer si le cache doit �tre utilis� et pour quel type de fichier. Vous pouvez �galement voir quel est la place utilis�e par le cache et l'effacer.",
	"ID_SETUP_RESET_CONFIG" => "Retour au d�faut",
	"ID_SETUP_DESC_ADMIN" => "Sur cette page vous pouvez envoyer de nouvelle photos et g�rer vos r�pertoires photos sur le serveur FTP configur� dans la configuration g�n�rale. Si vous avez install� phpAlbum avec l'assistant ceci devrait d�j� �tre configur�. Si vous d�placez le r�pertoire principal de phpAlbum, vous devez �galement modifier le param�tre de r�pertoire FTP.",
	"ID_SETUP_DESC_COMMENTS" => "Sur cette page vous pouvez �diter les param�tres � propos des commentaires et des votes sur vos photos. Cette page est �galement utilis�e pour approuver ou juste pour afficher les nouveaux commentaires.",
	"ID_SETUP_DESC_ECARD" => "Sur cette page vous pouvez �diter les param�tres des E-Cartes. Les E-Cartes sont des cartes postales �lectroniques, les utilisateurs peuvent envoyer des cartes avec vos photos (seulement avec un lien dans le mail) � d'autres gens.",
	"ID_SETUP_DESC_MODULES" => "On this page you can configure all installed modules of phpAlbum. After enabling of module click on configure to get the configuration screen of the module.",
	"ID_SETUP_ALBUM_DIR" => "R�pertoire albums et photos:",
	"ID_SETUP_ALBUM_DIR_DESC" => "Entrez ici le r�pertoire dans lequel sont stock�es vos photos. Le chemin est relatif par rapport au r�pertoire principal de phpAlbum.",
	"ID_SETUP_ERRORLOG_DESC" => "Ici sont r�pertori�es les �ventuelles erreurs de phpAlbum. Ceci peut �tre utile si quelque chose ne fonctionne pas et que vous voulez tenter de savoir pourquoi. Vous pouvez �galement utiliser ceci afin de reporter des bugs et obtenir de l'aide du support phpAlbum.",
	"ID_SETUP_TEXTS_DESC" => "Sur cette page vous pouvez cr�er votre propre traduction de l'album. Auparavant assurez-vous des traductions d�j� disponibles dans le panneau de configuration g�n�rale. Vous pouvez ici faire les ajustements que vous d�sirez ou bien cr�er une traduction compl�tement nouvelle. Si vous cr�ez une nouvelle traduction n'h�sitez pas � nous la faire parvenir (fichier translation.dat) afin que nous puissions l'incorporer dans la version standard.",
	"ID_SETUP_TEXTS_GUIDE" => "Guide de traduction: Vous pouvez traduire seulement les phrases que vous d�sirez changer. Celles-ci seront utilis�es � la place de la langue d'origine.<BR>Il existe 3 champs pour chaque �l�ment: son ID en gris, le texte original en vert et la boite de saisie de texte pour �crire votre traduction. Cette boite est jaune si aucun texte n'est entr�. <B>Pour une traduction compl�te dans une nouvelle langue r��crivez �galement les champs o� le texte traduit est le m�me que l'original</B>. Faites attention � bien r�utiliser les %s et les quelques caract�res sp�ciaux comme  &lt;b&gt;...",
	"ID_SETUP_CACHE_DIR" => "R�pertoire cache:",
	"ID_SETUP_CACHE_DIR_DESC" => "Entrez ici le r�pertoire cache relativement au r�pertoire de phpAlbum. Il doit �tre ouvert en �criture pour les utilisateurs.",
	"ID_SETUP_MY_ACCOUNT_DESC" => "Vous pouvez �diter ici vos param�tres utilisateur, nom, email, page perso et changer votre mot de passe.",
	"ID_SETUP_DESC_USERS" => "Sur cette page vous pouvez administrer les utilisateurs enregistr�s. Vous pouvez les supprimer ou les �diter. Pour cr�er un nouvel utilisateur, utilisez simplement la fonction d'enregistrement classique.",
	"ID_SETUP_DESC_GROUPS" => "Sur cette page vous pouvez administrer les groupes d'utilisateurs. Vous pourrez par la suite assigner des utilisateurs a ces groupes. Vous pouvez �galement restreindre l'acc�s � certaines galeries/r�pertoires par groupe. Par exemple, chaque membre du groupe famille peut atteindre votre galerie famille...",
	"ID_SETUP_DESC_DIRS" => "Sur cette page vous pouvez g�rer vos galeries. Vous pouvez changer les descriptions, les restrictions d'acc�s par groupe, le classement et autres manipulations d'images basiques.",
	"ID_SETUP_DESC_PICS" => "Sur cette page vous pouvez �diter les descriptions et les param�tres des photos.",
	"ID_SETUP_DESC_PARAMS" => "Ici vous pouvez ajouter, effacer et modifier les variables que vous souhaitez voir affich�es pour chaque photo. Ces variables seront affich�es sous chaque image. Il est �galement possible de modifier la visibilit� de chaque param�tre pour chaque r�pertoire s�par�ment, pour cela rendez-vous dans la section G�rer les galeries.",
	"ID_SETUP_PASSWORD" => "Mot de passe:",
	"ID_SETUP_PASSWORD_DESC" => "Entrez un mot de passe et entrez le � nouveau dans le second champ. Le mot de passe actuel ne peut �tre affich� car il est crypt�.",
	"ID_SETUP_LANGUAGE" => "Langue:",
	"ID_SETUP_LANGUAGE_DESC" => "Choisissez une langue et un set de caract�re pour l'affichage des pages. Jettez un oeil au Check syst�me pour vous assurez que le module mbstring est activ�, si ce n'est pas le cas soyez prudent si vous choisissez le codage UTF-8 lorsque vous nommez vos r�pertoires et fichiers afin de ne pas utiliser de caract�re sp�ciaux.",
	"ID_SETUP_SYSCHECK_DESC" => "On this page you can check your installation. Critical errors are shown with red color. Yellow color means only warning that some features are not accessible. Green color shows thet it is OK.",
	"ID_SETUP_HOME_URL" => "URL de retour � l'Index:",
	"ID_SETUP_HOME_URL_DESC" => "Entrez l'URL vers laquelle pointe le lien INDEX.",
	"ID_SETUP_SITE_NAME" => "Nom du site:",
	"ID_SETUP_SITE_NAME_DESC" => "Entrez le nom du site, celui-ci est utilis� comme titre de page.",
	"ID_SETUP_NEW_DIR_INDIC" => "Indicateur de nouveaux fichiers dans la galerie:",
	"ID_SETUP_NEW_DIR_INDIC_DESC" => "Combien de temps (en heure) l'ic�ne de la galerie indiquera qu'il y a des nouveaux fichiers.",
	"ID_SETUP_FTP_SERVER" => "Serveur FTP:",
	"ID_SETUP_FTP_SERVER_DESC" => "Entrez l'URL de votre serveur FTP, par exemple ftp.myserver.com",
	"ID_SETUP_FTP_PHOTO_DIR" => "R�pertoire photos FTP:",
	"ID_SETUP_FTP_PHOTO_DIR_DESC" => "Ceci est le r�pertoire o� sont stock�s vos photos sur le serveur FTP. Par exemple /phpAlbum/photos_xyz/. Les slashes de d�but et de fin sont obligatoires!",
	"ID_SETUP_QUALITY_NAME" => "Description:",
	"ID_SETUP_QUALITY_NAME_DESC" => "Description du param�tre de qualit�. Ce texte est affich� pour changer de qualit� d'affichage en haut de la page d'album.",
	"ID_SETUP_QUALITY_THMB" => "Miniature taille / qualit�",
	"ID_SETUP_QUALITY_THMB_DESC" => "Entrez ici la taille maximum pour les miniatures (ex 100 ou 150px). Le second param�tre est la compression jpeg (valeur normale entre 40 et 90). La qualit� de la compression est utilis�e pour les jpg, pas pour les png ou gif. Vous pouvez �galement activer l'option <b>Miniatures carr�es</b> afin que toutes les miniatures aient la m�me taille.",
	"ID_SETUP_QUALITY_PHOTO" => "Photo taille / qualit�",
	"ID_SETUP_QUALITY_PHOTO_DESC" => "Entrez ici la taille maximum pour les photos (ex 500 ou 800px). Le second param�tre est la compression jpeg (valeur normale entre 60 et 95). La qualit� de la compression est utilis�e pour les jpg, pas pour les png ou gif. <b>Entrez 0 dans le champ taille pour que la photo ne soit pas redimensionn�e</b>.",
	"ID_SETUP_DEFAULT_SORT" => "Classement par d�faut:",
	"ID_SETUP_DEFAULT_SORT_DESC" => "Choisissez un classement par d�faut pour les miniatures et les r�pertoires. Ceci est utilis� pour les r�pertoires dans lesquel le classement par d�faut est choisi.",
	"ID_SETUP_SQUARE_THMB" => "Miniatures carr�es",
	"ID_SETUP_ADD_QUALITY" => "Ajouter un groupe de param�tres de qualit�",
	"ID_SETUP_DELETE_QUALITY" => "Effacer ce param�tre de qualit�",
	"ID_SETUP_RESIZE_IF_BIGGER" => "Redimensionner seulement si plus grande",
	"ID_SETUP_RESIZE_TO_FIT" => "Redimensionner la photo pour ajuster:",
	"ID_SETUP_RESIZE_TO_FIT_DESC" => "S�lectionnez comment la photo doit �tre redimensionn�e. Par hauteur, largeur ou bien les deux.",
	"ID_BOTH_WIDTH_AND_HEIGHT" => "Largeur et hauteur",
	"ID_WIDTH" => "Largeur",
	"ID_HEIGHT" => "Hauteur",
	"ID_SETUP_THEME_SETTINGS" => "Param�tres du th�me",
	"ID_SETUP_THEME_COLOR_SETTINGS" => "Couleurs du th�me",
	"ID_SETUP_THEME_THUMBNAILS_STYLE" => "Style de miniatures:",
	"ID_SETUP_THEME" => "Th�me:",
	"ID_SETUP_THEME_DESC" => "Choissisez un des th�mes disponibles. Pour cr�er votre propre th�me copiez par exemple le r�pertoire du th�me Border dans un nouveau r�pertoire et modifiez-le.",
	"ID_SETUP_LOGO_PATH" => "Chemin du logo:",
	"ID_SETUP_LOGO_PATH_DESC" => "Entrez le chemin relatif vers le logo que vous voulez utiliser (utilis� pour le logo style FILE)",
	"ID_SETUP_LOGO_STYLE" => "Style de logo:",
	"ID_SETUP_LOGO_STYLE_DESC" => "Choisissez comment le logo doit �tre g�n�r�. NONE pour aucun logo; GRAPHICAL pour un logo g�n�r�; TEXT pour un logo simplement en texte et FILE pour un logo sous forme d'image.",
	"ID_SETUP_LOGO_TEXT" => "Texte du logo:",
	"ID_SETUP_LOGO_TEXT_DESC" => "Entrez le texte pour un logo de style GRAPHICAL ou TEXT.",
	"ID_SETUP_THEME_FLOWING_STYLE" => "Style fluide",
	"ID_SETUP_THEME_RASTER_STYLE" => "Style fix�",
	"ID_SETUP_MAX_PHOTO_PER_PAGE" => "Nombre de miniatures max par page:",
	"ID_SETUP_MAX_PHOTO_PER_PAGE_DESC" => "Entrez le nombre maximum de miniatures par page. S'il y a plus de photo de nouvelles pages seront cr�es.",
	"ID_SETUP_RASTER_SIZE" => "Colonnes / Lignes:",
	"ID_SETUP_RASTER_SIZE_DESC" => "Entrez le nombre de colonnes et de lignes pour le style fix�.",
	"ID_SETUP_SHOW_FILENAMES" => "Afficher les noms de fichiers",
	"ID_SETUP_SHOW_FILENAMES_DESC" => "Activer si vous d�sirez afficher les noms de fichiers sous les miniatures. Ils sont alors affich�s si aucune description de l'image n'a �t� entr�e.",
	"ID_SETUP_DISABLE_BOTTOM_NEXTPREV" => "D�sactiver les boutons suivante/pr�c�dente du bas de la page",
	"ID_SETUP_DISABLE_BOTTOM_NEXTPREV_DESC" => "Cette fonction d�sactive l'affichage des liens vers les images suivantes et pr�c�dentes en bas de la page.",
	"ID_SETUP_COLOR_SETTINGS" => "Param�tres de couleurs:",
	"ID_SETUP_ADD_COLOR_MAP" => "Ajouter une nouvelle carte de couleurs",
	"ID_SETUP_COLOR_DELETE" => "Effacer cette carte de couleurs",
	"ID_SETUP_COLOR_NAME" => "Nom de la carte de couleurs:",
	"ID_SETUP_COLOR_NAME_DESC" => "Ceci est le nom de la carte de couleurs. Si ce n'est pas la derni�re carte de couleurs vous pouvez l'effacer.",
	"ID_SETUP_ENABLE_LOGGING" => "Activer le log",
	"ID_SETUP_ENABLE_LOGGING_DESC" => "Cette fonction active l'enregistrement des acc�s � vos album.",
	"ID_SETUP_LOGS_FILENAME" => "Fichier log:",
	"ID_SETUP_LOGS_FILENAME_DESC" => "Nom du fichier o� le log est enregistr�",
	"ID_SETUP_LOGS_EXCLUDE" => "Textes � exclure:",
	"ID_SETUP_LOGS_EXCLUDE_DESC" => "Entrez les textes � exclure s�par�s par des ; (point-virgule). Vous pouvez ainsi exclure du log certaines adresses.",
	"ID_SETUP_CACHE_THUMBNAILS" => "Cache miniatures",
	"ID_SETUP_CACHE_RESIZED_PHOTOS" => "Cache des photos redimensionn�es",
	"ID_SETUP_CACHE_THUMBNAILS_DESC" => "Cette option active la mise en cache des miniatures. Ceci est recommand� car il sera plus rapide de charger des miniatures d�j� g�n�r�es plut�t que de les reg�n�rer � chaque visite.",
	"ID_SETUP_CACHE_RESIZED_PHOTOS_DESC" => "Cette option active la mise en cache des photos redimensionn�es. Ceci est �galement recommand� pour une question de rapidit�, mais cela n�c�ssite plus d'espace disque alors soyez vigilant.",
	"ID_SETUP_LOGIN" => "login",
	"ID_USERNAME" => "Pseudo",
	"ID_SETUP_ACT_DIR" => "R�pertoire actuel:",
	"ID_SETUP_ACT_DIR_DESC" => "Vous pouvez changer manuelle le r�pertoire FTP actuel. Il est plus simple d'utiliser les liens dans la liste de fichiers",
	"ID_SETUP_UPLOAD_FILE" => "Envoyer fichier:",
	"ID_SETUP_UPLOAD_FILE_DESC" => "Gr�ce � ceci vous pouvez facilement envoyer un fichier sur le serveur FTP",
	"ID_UPLOAD" => "Envoyer",
	"ID_SETUP_MAX_SIZE" => "Taille Max:",
	"ID_SETUP_UPLOAD_ZIP_FILE" => "Envoyer un fichier zip:",
	"ID_SETUP_UPLOAD_ZIP_FILE_DESC" => "Gr�ce a ceci vous pouvez facilement envoyer un fichier zip contenant plusieurs photos ainsi que l'arborescence associ�e",
	"ID_UPLOAD_ZIP" => "Envoyer zip",
	"ID_SETUP_CREATE_DIR" => "Cr�er r�pertoire",
	"ID_SETUP_CREATE_DIR_DESC" => "Ici vous pouvez cr�er un nouveau r�pertoire sur le serveur FTP.",
	"ID_CREATE" => "Cr�er",
	"ID_FILENAME" => "Fichier",
	"ID_SIZE" => "Taille",
	"ID_IMAGE_SIZE" => "Taille de l'image",
	"ID_OWNER" => "Propi�taire",
	"ID_GROUP" => "Groupe",
	"ID_FUNCTIONS" => "Fonction",
	"ID_TIME" => "Date",
	"ID_COMMAND" => "Commande",
	"ID_FILE_DIR" => "Fichier / R�pertoire",
	"ID_HOST" => "Host",
	"ID_PATH" => "Chemin",
	"ID_ALIAS" => "Alias",
	"ID_PASSWORDS" => "Mots de passes",
	"ID_SETUP_ENABLE_COMMENTS" => "Activer commentaires",
	"ID_SETUP_ENABLE_COMMENTS_DESC" => "Cette option active la possibilit� de laisser des commentaires sur vos photos.",
	"ID_SETUP_COMMENT_QUEUE" => "Taille de la liste d'attente",
	"ID_SETUP_COMMENT_QUEUE_DESC" => "Ici vous pouvez d�finir le nombre de messages qui seront en attente de confirmation. Les anciens commentaires seront automatiquement approuv�s, mais vous pouvez a tout moment effacer des commentaires sous le images.",
	"ID_SETUP_COMMENT_APPROVING_DESC" => "Ici apparaissent tous les commentaire en attente de confirmation. Approuver un commentaire l'enl�vera de la file d'attente mais le commentaire sera toujours visible sous l'image. Effacer un commentaire ici l'effacera �galement de sous l'image :",
	"ID_SETUP_NEW_COMMENTS" => "Nouveaux commentaires",
	"ID_SETUP_ENABLE_ECARD" => "Active les e-cartes",
	"ID_SETUP_ENABLE_ECARD_DESC" => "Cette option active la possibilit� d'envoyer des e-carte depuix votre album",
	"ID_SETUP_ECARD_SUBJECT" => "Sujet de l'email",
	"ID_SETUP_ECARD_SUBJECT_DESC" => "Ce texte est utilis� comme sujet de l'e-mail de transmission des e-cartes",
	"ID_SETUP_ECARD_PICKED_SUBJECT" => "Sujet du mail carte lue!",
	"ID_SETUP_ECARD_PICKED_SUBJECT_DESC" => "Ce texte sera utilis� comme sujet de mail transmis losrque l'e-carte de l'exp�diteur est lue",
	"ID_SETUP_ECARD_TEXT" => "Texte du mail de l'e-carte",
	"ID_SETUP_ECARD_TEXT_DESC" => "Ceci est le message envoy� par mail. Vous pouvez utiliser diff�rents param�tres comme #TO_NAME, #TO_EMAIL, #FROM_NAME, #FROM_EMAIL, #DATE, #TIME, #ECARD_ADRESS, #IMAGE_ADRESS",
	"ID_SETUP_ECARD_PICKED_TEXT" => "Texte du mail Carte lue! ",
	"ID_APPROVE" => "Approuver",
	"ID_DELETE" => "Effacer",
	"ID_TEXT" => "Texte",
	"ID_PICTURE" => "Image",
	"ID_TYPE" => "Type",
	"ID_ERROR_NUMBER" => "ErrNum",
	"ID_ERROR_MESSAGE" => "Message d'erreur",
	"ID_SCRIPT_NAME" => "Nom du script",
	"ID_LINE" => "Ligne",
	"ID_SAVE" => "sauver",
	"ID_SETUP_USERNAME_DESC" => "Entrez le pseudo d�sir�. Un message d'erreur vous avertira si ce pseudo existe d�j�.",
	"ID_RETYPE_PASSWORD" => "R�-entrez le mot de passe",
	"ID_SETUP_EMAIL" => "Adresse email:",
	"ID_SETUP_EMAIL_DESC" => "Entrez votre adresse email, celle-ci ne sera pas publi�e.",
	"ID_SETUP_HOMEPAGE" => "Page perso",
	"ID_SETUP_HOMEPAGE_DESC" => "Ceci est l'adresse de votre page perso, elle sera publi�e avec vos commentaires.",
	"ID_SETUP_REGISTER_NEW_USER" => "Enregistrer",
	"ID_THANKS_FOR_REGISTER" => "Merci de vous �tre enregistr�s",
	"ID_SETUP_DELETE_ERROROLOG" => "Effacer le log",
	"ID_SETUP_ADD_GROUP" => "Ajouter un groupe d'utilisateurs",
	"ID_SETUP_NEW_GROUP_NAME" => "Nom du nouveau groupe:",
	"ID_SETUP_ADD_GROUP_DESC" => "Entrez un nom de group et cliquez sur le bouton. Ceci cr�era un nouveau groupe auquel vous pourrez ensuite associer des albums et des utilisateurs",
	"ID_SETUP_SHOW_DIRS" => "Afficher les galeries associ�es",
	"ID_SETUP_SHOW_USERS" => "Afficher les utilisateurs",
	"ID_USER" => "Utilisateurs",
	"ID_EDIT" => "Editer",
	"ID_ID" => "Id",
	"ID_NOT_POSSIBLE" => "Impossible",
	"ID_SETUP_ADD_NEW_PARAM" => "Ajouter un param�tre",
	"ID_SETUP_ADD_PARAM_DESC" => "Entrez le nom du nouveau param�tre et s�lectionnez le type de param�tre.<ul><li><b>User value</b> - Valeur texte d�finie par l'utilisateur</li><li><b>User list of values</b> - Liste de valeurs pr�d�finies par l'utilisateur pouvant �tre choisies pour chaque photo</li><li><b>System value</b> - Vous pouvez alors s�lectionner comme valeur par d�faut des param�tres images comme les dimensions, tailles, date, nom de fichier, ...</li></ul>",
	"ID_SETUP_PARAM_NAME" => "Nom du param�tre",
	"ID_SETUP_PARAM_NAME_DESC" => "Entrez le nom du nouveau param�tre si vous d�sirez le changer. Si vous effacez le param�tre ici, il le sera �galement sous chaque image alors soyez prudents.",
	"ID_SETUP_DELETE_PARAM" => "Effacer param�tre",
	"ID_SETUP_PARAM_DEFAULT" => "Valeur par d�faut:",
	"ID_SETUP_PARAM_DEFAULT_DESC" => "Ici vous pouvez entrer une valeur par d�faut pour ce param�tre au cas o� le param�tre photo n'existe pas.",
	"ID_ALLOW_HTML" => "Activer les codes HTML (pas de filtrage possible)",
	"ID_SETUP_PARAM_SYS_DEFAULT" => "Valeur auto:",
	"ID_SETUP_PARAM_SYS_DEFAULT_DESC" => "Choisissez la valeur � afficher pour ce param�tre",
	"ID_SETUP_EDIT_LOV" => "Editer la liste des valeurs",
	"ID_SETUP_DELETE_LOV" => "Effacer valeur",
	"ID_NOT_DEFINED" => "NOT DEFINED",
	"ID_ADD_NEW_VALUE" => "Ajouter une valeur",
	"ID_SETUP_ACCOUNT_GROUP_DESC" => "Choisissez un ou des groupes � associer avec cet utilisateur",
	"ID_SETUP_GALLERY" => "Galerie:",
	"ID_SETUP_GALLERY_DESC" => "Choisissez la galerie � �diter. Si la galerie n'apparait pas, rescannez les r�pertoires avec le lien ci-dessous...",
	"ID_SETUP_ALIAS" => "Nom alias:",
	"ID_SETUP_ALIAS_DESC" => "Entrez un nom d'alias qui sera affich� � la place du nom du r�pertoire",
	"ID_SETUP_DESC" => "Courte description:",
	"ID_SETUP_DESC_DESC" => "Cette courte description du r�pertoire sera affich�e sous la miniature/logo du r�pertoire",
	"ID_SETUP_PIC_DESC_DESC" => "Ceci est une courte description de l'image, elle peut-�tre affich�e sous la miniature de l'image.",
	"ID_SETUP_LONG_DESC" => "Description compl�te:",
	"ID_SETUP_LONG_DESC_DESC" => "Entrez une description plus exhaustive pour ce r�pertoire. Vous pouvez �galement utiliser du code HTML. Pour une nouvelle ligne tapez &lt;br&gt;.",
	"ID_SETUP_PIC_LONG_DESC_DESC" => "Entrez une description plus exhaustive pour cette image. Vous pouvez �galement utiliser du code HTML. Pour une nouvelle ligne tapez &lt;br&gt;.",
	"ID_SETUP_SORTING" => "Classement:",
	"ID_SETUP_SORTING_DESC" => "Choisissez un ordre de classement pour les images de ce r�pertoire. D�faut signifie que le type de classement d�fini en configuration g�n�rale sera utilis�.",
	"ID_SETUP_VISIBLE" => "Visible",
	"ID_SETUP_VISIBLE_DESC" => "D�termine si le r�pertoire sera ou non affich�",
	"ID_SETUP_ACCESS_RIGHTS" => "Droits d'acc�s",
	"ID_SETUP_GALLERY_GROUP_DESC" => "Choisissez des groupes si vous voulez restreindre l'acc�s � certains groupes. Les options d�saciv�es sont h�rit�es des galeries parentes vous ne pouvez donc pas les modifier ici mais dans les galeries respectives.",
	"ID_SETUP_GALLERY_PARAMS_DESC" => "Selectionnez les param�tres que vous voulez afficher avec les images. Pour d�finir plus de param�tre rendez-vous dans la section Param photos.",
	"ID_SETUP_SHOW_CUSTOM_PARAMS" => "Afficher les param�tres personalis�s",
	"ID_SETUP_SHOW_DEFAULT_PARAMS" => "Afficher les param�tres par d�faut",
	"ID_SETUP_PARAMS_DEFAULT_CUSTOM_DESC" => "Choisissez si vous d�sirez afficher les param�tres par d�faut ou une s�lection de param�tres personnalis�s sous chaque image de cette galerie.",
	"ID_SETUP_SHOW_PARAMS" => "Personnalis�s ou d�faut:",
	"ID_NO_DEFINED_PARAMS" => "Aucun param�tre d�fini",
	"ID_SETUP_NEXT_SCAN" => "Prochain scan automatique des r�pertoires: %s",
	"ID_SETUP_SCAN_DIRS" => "Scanner les r�pertoire maintenant!",
	"ID_DEFAULT_DISPLAYED" => "Affichage par d�faut",
	"ID_SETUP_PARAM_DEFAULT_DISPLAYED_DESC" => "Cochez cette option si vous d�sirez afficher ce param�tre par d�faut. C'est � dire dans toutes les galeries pour lesquel les param�tres par d�faut sont s�lectionn�s.",
	"ID_HTML_NOT_ALLOWED" => "Le code HTML n'est pas autoris�",
	"ID_HTML_ALLOWED" => "Le code HTML est autoris�",
	"ID_DEFAULT_VALUE" => "La valeur par d�faut est <b>%s</b>",
	"ID_NO_DEFAULT_VALUE" => "Aucune valeur par d�faut",
	"ID_DEFAULT" => "D�faut",
	"ID_SETUP_THEME_BORDERS" => "Bordure des images et miniatures",
	"ID_SETUP_THEME_PIC_BORDER_SIZE" => "Taille de la bordure des images",
	"ID_SETUP_THEME_THMB_BORDER_SIZE" => "Taille de la bordure des miniatures",
	"ID_SETUP_THEME_DISPLAY_SHADOWS" => "Afficher l'ombre",
	"ID_SETUP_THEME_DISPLAY_SHADOWS_DESC" => "Si cela est support� par le th�me cette option affiche une ombre derri�re les images et miniatures.",
	"ID_SETUP_THEME_PIC_BORDER_SIZE_DESC" => "Entrez la largeur de la bordure autour des images (en px)",
	"ID_SETUP_THEME_THMB_BORDER_SIZE_DESC" => "Entrez la largeur de la bordure autour des miniatures (en px)",
	"ID_SETUP_WATERMARK_FILE" => "Fichier signature",
	"ID_SETUP_WATERMARK_FILE_DESC" => "S�lectionnez un fichier png qui sera ajout� comme signature sur les images redimensionn�es.",
	"ID_NO_WATERMARK" => "Aucun fichier signature s�lectionn�",
	"ID_SETUP_WATERMARK_POSITION" => "Position de la signature",
	"ID_SETUP_WATERMARK_POSITION_DESC" => "Choisissez une position pour la signature sur l'image",
	"ID_SETUP_DIR_LOGO_STYLE" => "Style des ic�nes de r�pertoires",
	"ID_SETUP_DIR_LOGO_STYLE_DESC" => "Choisissez comment les r�pertoires sont affich�s, avec une ic�ne de r�pertoire ou avec une miniature avec une taille normale ou sp�cifi�e.",
	"ID_SETUP_DIR_LOGO_STYLE_LOGO" => "Ic�ne de r�pertoire",
	"ID_SETUP_DIR_LOGO_STYLE_PIC1" => "Miniature (m�me taille que les miniatures)",
	"ID_SETUP_DIR_LOGO_STYLE_PIC2" => "Miniature (taille sp�cifi�e)",
	"ID_USE_FOR_LOGO" => "Utiliser comme ic�ne du r�pertoire",
	"ID_SETUP_ADD_THMB_HEIGHT" => "Hauteur de miniature additionnelle",
	"ID_SETUP_ADD_THMB_WIDTH" => "Largeur de miniature additionnelle",
	"ID_SETUP_ADD_THMB_HEIGHT_WIDTH_DESC" => "Augmentez cette valeur si vous utilisez plus de ligne pour la description des albums ou des photos. Ceci cr�era alors plus d'espace sous les miniatures en mode fluide car cela peut causer des probl�mes d'affichage.",
	"ID_SETUP_SHARPEN_WITH_PARAM" => "Activer la nettet� avec les param�tres suivants:",
	"ID_SETUP_AMOUNT" => "Niveau",
	"ID_SETUP_RADIUS" => "Rayon",
	"ID_SETUP_TRESHOLD" => "Seuil",
	"ID_SETUP_SHARPEN_DESC" => "Vous pouvez activer la nettet� des miniatures qui sont g�n�ralement liss�es apr�s redimensionnement. <b>Soyez prudents car cela peut affecter les performances</b>.",
	"ID_SETUP_SHARPEN_THMB" => "Renforcer la nettet� des miniatures",
	"ID_SETUP_INFO_THMB" => "Afficher sous les miniatures:",
	"ID_SETUP_INFO_THMB_DESC" => "Choisissez les informations � afficher sous les miniatures.",
	"ID_SETUP_INFO_THMB_VIEWS" => "Nombre de vues",
	"ID_SETUP_INFO_THMB_COMMENTS" => "Nombre de commentaires",
	"ID_SETUP_INFO_THMB_VOTES" => "Status des votes",
	"ID_SETUP_DATE_FORMAT" => "Format Date/Heure",
	"ID_SETUP_DATE_FORMAT_DESC" => "Param�trez le format de Date/Heure que vous souhaitez utiliser. Utilise le standard PHP de la fonction date().",
	"ID_SETUP_PRIVILEGES" => "Privil�ges",
	"ID_SETUP_PRIVILEGES_DESC" => "Ici vous pouvez param�trer quel groupe acc�de � quelle fonction de configuration. Le vert indique que l'acc�s est autoris� et le rouge que l'acc�s est interdit pour le groupe concern�. Cliquez sur le lien pour permettre ou interdire les acc�s.<br/><br/>Dans la colonne d�faut vous pouvez d�finir dans quel groupe seront automatiquement assign�s les nouveaux utilisateurs.",
	"ID_DISABLE_ERROR_LOG" => "D�sactiver le log des erreurs",
	"ID_SETUP_ENABLE_ANTISPAM" => "Activer l'anti-spam",
	"ID_SETUP_ENABLE_ANTISPAM_DESC" => "Active l'image anti-spam. Ceci rend difficile l'envoi automatique de spam sur les commentaires de vos images.",
	"ID_SETUP_PUBLISH_ONLY_APPROVED" => "Publier seulement les commentaires approuv�s.",
	"ID_SETUP_PUBLISH_ONLY_APPROVED_DESC" => "Si cette option est coch�e, seuls les commentaires approuv�s seront publi�s.",
	"ID_SETUP_THEME_NEWEST_COUNT" => "Nombre de nouvelles photos",
	"ID_SETUP_THEME_NEWEST_COUNT_DESC" => "Entrez le nombre de nouvelles photos qui seront affich�es sur la premi�re page (si le th�me le permet)",
	"ID_SETUP_USE_IPTC_DESC" => "Utiliser la description IPTC",
	"ID_SETUP_USE_IPTC_DESC_DESC" => "Si cette option est coch�e, lorsque les images sont scann�es pour la premi�re fois les param�tres IPTC sont automatiquement utilis�s comme descriptions courtes et longues des images.",
	"ID_IMAGEORIG" => "T�l�chargement d'images",
	"ID_IMAGEVIEW" => "Vue des images",
	"ID_PHOTONOTES" => "PhotoNotes",
	"ID_SEARCHENGINE" => "SearchEngine",
	"ID_SETUP_SHOW_SEARCH_BOX" => "Afficher la boite de recherche",
	"ID_SETUP_SHOW_SEARCH_BOX_DESC" => "Cette option active ou d�sactive l'affichage de la boite de recherche. Actuellement la recherche ne fonctionne que pour les mots-clefs import�s des IPTC.",
	"ID_SETUP_TRACKING_CODE" => "Tracking code",
	"ID_SETUP_TRACKING_CODE_DESC" => "Vous pouvez entrer ici des tracking code (comme pour Goggle Analytics ou Xiti) qui seront affich�s sur chaque page.",
	"ID_SETUP_THEME_CUSTOM_PARAMETERS" => "Custom theme parameters",
	"ID_FILESYSTEM_CHARSET" => "Filesystem Character set",
	"ID_FILESYSTEM_CHARSET_DESC" => "Here you can select character set of your filesystem, in most cases it is ISO8859-1 or UTF-8. If you don't know it, ask your administrator.'",
	"ID_MSG_DIR_NOT_EXISTS" => "Le r�pertoire %S n'existe pas, changez �a!",
	"ID_MSG_DIR_NOT_WRITABLE" => "Le r�pertoire %s n'est pas accessible en �criture, changez ces droits avec CHMOD !",
	"ID_MSG_FILE_NOT_EXISTS" => "LE fichier %s ne peut �tre trouv�",
	"ID_FILE_WAS_DELETED" => "Le fichier %s a �t� effac�",
	"ID_MSG_SETUP_FTP" => "Allez sur l'onglet de configuration g�n�rale et entrez un serveur FTP ainsi que le r�pertoire FTP contenant vos photos afin d'utiliser ce service.",
	"ID_MSG_FTP_SUPPORT" => "La fonction FTP n'est pas support�e! Vous ne pouvez utiliser ce service, demandez � votre fournisseur d'acc�s de l'activer ou de l'installer.",
	"ID_MSG_FTP_UNABLE_CONNECT" => "Impossible de se connecter au serveur %s",
	"ID_MSG_FTP_INVALID_LOGIN" => "Pseudo ou mot de passe invalide!",
	"ID_MSG_FTP_PASSIVE_MODE" => "Impossible de passer en mode FTP passif sur le serveur",
	"ID_MSG_FTP_UNABLE_CHDIR" => "Impossible de changer vers le r�pertoire %s",
	"ID_MSG_FTP_PHOTO_DIR" => "Le r�pertoire photo FTP pointe vers un autre r�pertoire, pas vers les photos.",
	"ID_MSG_FTP_UNABLE_DELETE" => "Impossible de supprimer le fichier %s sur le serveur FTP",
	"ID_MSG_FTP_UNABLE_UPLOAD" => "Impossible d'envoyer le fichier %s !",
	"ID_MSG_FTP_UNABLE_OPEN_TMP" => "Impossible d'ouvrir le fichier temporaire !",
	"ID_MSG_FTP_UNABLE_MKDIR" => "Impossible de cr�e le r�pertoire %s sur le serveur FTP",
	"ID_MSG_FTP_UNABLE_RMDIR" => "Impossible de supprimer le r�pertoire %s sur le serveur FTP !",
	"ID_MSG_FTP_NOT_ZIP" => "Le fichier n'est pas un zip ni un format support�!",
	"ID_MSG_FTP_ZIP_UNSUPPORTED" => "La fonction ZIP n'est pas install�e!",
	"ID_MSG_FTP_FILE_UPLOAD_ATTACK" => "Possible file upload attack!",
	"ID_MSG_PASSWORD_ERROR" => "Le mot de passe retap� est diff�rent du premier. Le mot e passe est inchang�!",
	"ID_MSG_EMAIL_REQUIRED" => "L'adresse e-mail oit �tre entr�e. Entrez votre adresse e-mail, elle ne sera pas publi�e sur le site.",
	"ID_MSG_USERNAME_EXISTS" => "Le pseudo <b>%s</b> existe d�j�!",
	"ID_MSG_PASSWORD_REQUIRED" => "Mot de passe requis!",
	"ID_MSG_GROUP_EXISTS" => "Le groupe <b>%s</b> existe d�j�!",
	"ID_MSG_PARAM_EXISTS" => "Le param�tre <b>%s</b> existe d�j�!",
	"ID_MSG_PARAM_MANDATORY" => "Le nom du param�tre est obligatoire!",
	"ID_MSG_USERNAME_MANDATORY" => "Le pseudo est obligatoire!",
	"ID_MSG_MBSTRING_MISSING" => "You are missing MBSTRING module, this is only problematic if you are using different character string encoding for your filesystem and in your language setting. Please correct one of this settings or install/enable MBSTRING PHP module. If you can't do it, just be sure that your directory and file names does not include special characters.",
); return $pa_texts; }