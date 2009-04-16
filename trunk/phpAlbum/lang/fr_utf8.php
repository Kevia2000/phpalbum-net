<?php
function pa_get_frontend_lang(){
$pa_texts=Array(
	"ID_NEXT" => "suivante",
	"ID_PREV" => "prédédente",
	"ID_NEXT_PAGE" => "page suivante",
	"ID_PREV_PAGE" => "page précédente",
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
	"ID_ERROR_PAGE_MESSAGE" => "Vous n'êtes pas autorisés à afficher cette page!",
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
	"ID_SYS_PAR_FNL" => "<a class=\"me3\" href=\"%s\" target=\"_blank\">%s</a> (cliquez pour télécharger le fichier original)",
	"ID_SYS_PAR_DWL" => "<a class=\"me3\" href=\"%s\" target=\"_blank\">(cliquez pour télécharger le fichier original)</a>",
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
	"ID_REMEMBER" => "Mémoriser",
	"ID_PASSWORD" => "Mot de passe",
	"ID_PHOTO_DETAILS" => "Détails de la photo",
	"ID_ENTER_ANTISPAM_CODE" => "Entrez le code anti-spam",
	"ID_NEWEST_PICTURES" => "Dernières photos",
	"ID_PICTURES" => "Pictures",
	"ID_DID_YOU_MEAN" => "Did you mean: ",
	"ID_ADD_NOTE" => "Add Note",
	"ID_DELETE_ALL_NOTES" => "Delete Notes",
); return $pa_texts; }

function pa_get_backend_lang(){
$pa_texts=Array(
	"ID_ENABLE" => "Activer",
	"ID_SETUP_MENU" => "Menu:",
	"ID_SETUP_MENU_MAIN" => "Configuration générale",
	"ID_SETUP_MENU_LOGS" => "Log des accès",
	"ID_SETUP_MENU_DIRS" => "Gérer les galeries",
	"ID_SETUP_MENU_CACHE" => "Options du cache",
	"ID_SETUP_MENU_ADMIN" => "Utilitaire FTP",
	"ID_SETUP_MENU_COMMENTS" => "Commentaires et votes",
	"ID_SETUP_MENU_ECARD" => "e-cartes",
	"ID_SETUP_MENU_TEXTS" => "Traductions",
	"ID_SETUP_MENU_ERRORLOG" => "Log des erreurs",
	"ID_SETUP_MENU_SYSCHECK" => "Check système",
	"ID_SETUP_MENU_THUMBNAILS" => "Miniatures",
	"ID_SETUP_MENU_THEMES" => "Thèmes",
	"ID_SETUP_MENU_USERS" => "Utilisateurs",
	"ID_SETUP_MENU_GROUPS" => "Groupes",
	"ID_SETUP_SAVE_CONFIG" => "Sauver config",
	"ID_SETUP_MY_ACCOUNT" => "Mon compte",
	"ID_SETUP_MENU_PARAMS" => "Paramètres photos",
	"ID_SETUP_MENU_PICS" => "Gérer les photos",
	"ID_SETUP_MENU_SEARCH" => "Search engine",
	"ID_SETUP_THUMBNAILS" => "Groupe de paramètres",
	"ID_SETUP_DESC_MAIN" => "Ceci est la page de configuration générale de phpAlbum. Cette page est chargée automatiquement après l'installation et vous devez l'éditer avant d'utiliser phpAlbum.",
	"ID_SETUP_DESC_THUMBNAILS" => "Sur cette page vous pouvez éditer la taille et la qualité des photos et miniatures. Chaque groupe d'options représente une configuration de qualité. L'utilisateur peut alors modifier les paramètres de qualité comme il l'entend. Vous pouvez ajouter ou supprimer des groupes de paramètres à votre convenance, il n'est pas possible de supprimer tous les groupes de paramètres.",
	"ID_SETUP_DESC_THEMES" => "Sur cette page vous pouvez éditer les paramètres d'affichage de votre album. Vous pouvez choisir le style des miniatures fluide ou fixé. Vous pouvez également choisir votre thème et les couleurs.",
	"ID_SETUP_DESC_LOGS" => "Sur cette page vous pouvez activer l'enregistrement des accès à vos galeries. Vous pouvez également changer le nom de votre fichier log afin que personne ne puisse y accéder. Enfin, vous pouvez entrer des noms à ignorer afin de ne pas compter le passage de certaines personnes.",
	"ID_SETUP_DESC_CACHE" => "Dans cette section vous pouvez paramétrer si le cache doit être utilisé et pour quel type de fichier. Vous pouvez également voir quel est la place utilisée par le cache et l'effacer.",
	"ID_SETUP_RESET_CONFIG" => "Retour au défaut",
	"ID_SETUP_DESC_ADMIN" => "Sur cette page vous pouvez envoyer de nouvelle photos et gérer vos répertoires photos sur le serveur FTP configuré dans la configuration générale. Si vous avez installé phpAlbum avec l'assistant ceci devrait déjà être configuré. Si vous déplacez le répertoire principal de phpAlbum, vous devez également modifier le paramètre de répertoire FTP.",
	"ID_SETUP_DESC_COMMENTS" => "Sur cette page vous pouvez éditer les paramètres à propos des commentaires et des votes sur vos photos. Cette page est également utilisée pour approuver ou juste pour afficher les nouveaux commentaires.",
	"ID_SETUP_DESC_ECARD" => "Sur cette page vous pouvez éditer les paramètres des E-Cartes. Les E-Cartes sont des cartes postales électroniques, les utilisateurs peuvent envoyer des cartes avec vos photos (seulement avec un lien dans le mail) à d'autres gens.",
	"ID_SETUP_DESC_MODULES" => "On this page you can configure all installed modules of phpAlbum. After enabling of module click on configure to get the configuration screen of the module.",
	"ID_SETUP_ALBUM_DIR" => "Répertoire albums et photos:",
	"ID_SETUP_ALBUM_DIR_DESC" => "Entrez ici le répertoire dans lequel sont stockées vos photos. Le chemin est relatif par rapport au répertoire principal de phpAlbum.",
	"ID_SETUP_ERRORLOG_DESC" => "Ici sont répertoriées les éventuelles erreurs de phpAlbum. Ceci peut être utile si quelque chose ne fonctionne pas et que vous voulez tenter de savoir pourquoi. Vous pouvez également utiliser ceci afin de reporter des bugs et obtenir de l'aide du support phpAlbum.",
	"ID_SETUP_TEXTS_DESC" => "Sur cette page vous pouvez créer votre propre traduction de l'album. Auparavant assurez-vous des traductions déjà disponibles dans le panneau de configuration générale. Vous pouvez ici faire les ajustements que vous désirez ou bien créer une traduction complètement nouvelle. Si vous créez une nouvelle traduction n'hésitez pas à nous la faire parvenir (fichier translation.dat) afin que nous puissions l'incorporer dans la version standard.",
	"ID_SETUP_TEXTS_GUIDE" => "Guide de traduction: Vous pouvez traduire seulement les phrases que vous désirez changer. Celles-ci seront utilisées à la place de la langue d'origine.<BR>Il existe 3 champs pour chaque élément: son ID en gris, le texte original en vert et la boite de saisie de texte pour écrire votre traduction. Cette boite est jaune si aucun texte n'est entré. <B>Pour une traduction complète dans une nouvelle langue réécrivez également les champs où le texte traduit est le même que l'original</B>. Faites attention à bien réutiliser les %s et les quelques caractères spéciaux comme  &lt;b&gt;...",
	"ID_SETUP_CACHE_DIR" => "Répertoire cache:",
	"ID_SETUP_CACHE_DIR_DESC" => "Entrez ici le répertoire cache relativement au répertoire de phpAlbum. Il doit être ouvert en écriture pour les utilisateurs.",
	"ID_SETUP_MY_ACCOUNT_DESC" => "Vous pouvez éditer ici vos paramètres utilisateur, nom, email, page perso et changer votre mot de passe.",
	"ID_SETUP_DESC_USERS" => "Sur cette page vous pouvez administrer les utilisateurs enregistrés. Vous pouvez les supprimer ou les éditer. Pour créer un nouvel utilisateur, utilisez simplement la fonction d'enregistrement classique.",
	"ID_SETUP_DESC_GROUPS" => "Sur cette page vous pouvez administrer les groupes d'utilisateurs. Vous pourrez par la suite assigner des utilisateurs a ces groupes. Vous pouvez également restreindre l'accès à certaines galeries/répertoires par groupe. Par exemple, chaque membre du groupe famille peut atteindre votre galerie famille...",
	"ID_SETUP_DESC_DIRS" => "Sur cette page vous pouvez gérer vos galeries. Vous pouvez changer les descriptions, les restrictions d'accès par groupe, le classement et autres manipulations d'images basiques.",
	"ID_SETUP_DESC_PICS" => "Sur cette page vous pouvez éditer les descriptions et les paramètres des photos.",
	"ID_SETUP_DESC_PARAMS" => "Ici vous pouvez ajouter, effacer et modifier les variables que vous souhaitez voir affichées pour chaque photo. Ces variables seront affichées sous chaque image. Il est également possible de modifier la visibilité de chaque paramètre pour chaque répertoire séparément, pour cela rendez-vous dans la section Gérer les galeries.",
	"ID_SETUP_PASSWORD" => "Mot de passe:",
	"ID_SETUP_PASSWORD_DESC" => "Entrez un mot de passe et entrez le à nouveau dans le second champ. Le mot de passe actuel ne peut être affiché car il est crypté.",
	"ID_SETUP_LANGUAGE" => "Langue:",
	"ID_SETUP_LANGUAGE_DESC" => "Choisissez une langue et un set de caractère pour l'affichage des pages. Jettez un oeil au Check système pour vous assurez que le module mbstring est activé, si ce n'est pas le cas soyez prudent si vous choisissez le codage UTF-8 lorsque vous nommez vos répertoires et fichiers afin de ne pas utiliser de caractère spéciaux.",
	"ID_SETUP_SYSCHECK_DESC" => "On this page you can check your installation. Critical errors are shown with red color. Yellow color means only warning that some features are not accessible. Green color shows thet it is OK.",
	"ID_SETUP_HOME_URL" => "URL de retour à l'Index:",
	"ID_SETUP_HOME_URL_DESC" => "Entrez l'URL vers laquelle pointe le lien INDEX.",
	"ID_SETUP_SITE_NAME" => "Nom du site:",
	"ID_SETUP_SITE_NAME_DESC" => "Entrez le nom du site, celui-ci est utilisé comme titre de page.",
	"ID_SETUP_NEW_DIR_INDIC" => "Indicateur de nouveaux fichiers dans la galerie:",
	"ID_SETUP_NEW_DIR_INDIC_DESC" => "Combien de temps (en heure) l'icône de la galerie indiquera qu'il y a des nouveaux fichiers.",
	"ID_SETUP_FTP_SERVER" => "Serveur FTP:",
	"ID_SETUP_FTP_SERVER_DESC" => "Entrez l'URL de votre serveur FTP, par exemple ftp.myserver.com",
	"ID_SETUP_FTP_PHOTO_DIR" => "Répertoire photos FTP:",
	"ID_SETUP_FTP_PHOTO_DIR_DESC" => "Ceci est le répertoire où sont stockés vos photos sur le serveur FTP. Par exemple /phpAlbum/photos_xyz/. Les slashes de début et de fin sont obligatoires!",
	"ID_SETUP_QUALITY_NAME" => "Description:",
	"ID_SETUP_QUALITY_NAME_DESC" => "Description du paramètre de qualité. Ce texte est affiché pour changer de qualité d'affichage en haut de la page d'album.",
	"ID_SETUP_QUALITY_THMB" => "Miniature taille / qualité",
	"ID_SETUP_QUALITY_THMB_DESC" => "Entrez ici la taille maximum pour les miniatures (ex 100 ou 150px). Le second paramètre est la compression jpeg (valeur normale entre 40 et 90). La qualité de la compression est utilisée pour les jpg, pas pour les png ou gif. Vous pouvez également activer l'option <b>Miniatures carrées</b> afin que toutes les miniatures aient la même taille.",
	"ID_SETUP_QUALITY_PHOTO" => "Photo taille / qualité",
	"ID_SETUP_QUALITY_PHOTO_DESC" => "Entrez ici la taille maximum pour les photos (ex 500 ou 800px). Le second paramètre est la compression jpeg (valeur normale entre 60 et 95). La qualité de la compression est utilisée pour les jpg, pas pour les png ou gif. <b>Entrez 0 dans le champ taille pour que la photo ne soit pas redimensionnée</b>.",
	"ID_SETUP_DEFAULT_SORT" => "Classement par défaut:",
	"ID_SETUP_DEFAULT_SORT_DESC" => "Choisissez un classement par défaut pour les miniatures et les répertoires. Ceci est utilisé pour les répertoires dans lesquel le classement par défaut est choisi.",
	"ID_SETUP_SQUARE_THMB" => "Miniatures carrées",
	"ID_SETUP_ADD_QUALITY" => "Ajouter un groupe de paramètres de qualité",
	"ID_SETUP_DELETE_QUALITY" => "Effacer ce paramètre de qualité",
	"ID_SETUP_RESIZE_IF_BIGGER" => "Redimensionner seulement si plus grande",
	"ID_SETUP_RESIZE_TO_FIT" => "Redimensionner la photo pour ajuster:",
	"ID_SETUP_RESIZE_TO_FIT_DESC" => "Sélectionnez comment la photo doit être redimensionnée. Par hauteur, largeur ou bien les deux.",
	"ID_BOTH_WIDTH_AND_HEIGHT" => "Largeur et hauteur",
	"ID_WIDTH" => "Largeur",
	"ID_HEIGHT" => "Hauteur",
	"ID_SETUP_THEME_SETTINGS" => "Paramètres du thème",
	"ID_SETUP_THEME_COLOR_SETTINGS" => "Couleurs du thème",
	"ID_SETUP_THEME_THUMBNAILS_STYLE" => "Style de miniatures:",
	"ID_SETUP_THEME" => "Thème:",
	"ID_SETUP_THEME_DESC" => "Choissisez un des thèmes disponibles. Pour créer votre propre thème copiez par exemple le répertoire du thème Border dans un nouveau répertoire et modifiez-le.",
	"ID_SETUP_LOGO_PATH" => "Chemin du logo:",
	"ID_SETUP_LOGO_PATH_DESC" => "Entrez le chemin relatif vers le logo que vous voulez utiliser (utilisé pour le logo style FILE)",
	"ID_SETUP_LOGO_STYLE" => "Style de logo:",
	"ID_SETUP_LOGO_STYLE_DESC" => "Choisissez comment le logo doit être généré. NONE pour aucun logo; GRAPHICAL pour un logo généré; TEXT pour un logo simplement en texte et FILE pour un logo sous forme d'image.",
	"ID_SETUP_LOGO_TEXT" => "Texte du logo:",
	"ID_SETUP_LOGO_TEXT_DESC" => "Entrez le texte pour un logo de style GRAPHICAL ou TEXT.",
	"ID_SETUP_THEME_FLOWING_STYLE" => "Style fluide",
	"ID_SETUP_THEME_RASTER_STYLE" => "Style fixé",
	"ID_SETUP_MAX_PHOTO_PER_PAGE" => "Nombre de miniatures max par page:",
	"ID_SETUP_MAX_PHOTO_PER_PAGE_DESC" => "Entrez le nombre maximum de miniatures par page. S'il y a plus de photo de nouvelles pages seront crées.",
	"ID_SETUP_RASTER_SIZE" => "Colonnes / Lignes:",
	"ID_SETUP_RASTER_SIZE_DESC" => "Entrez le nombre de colonnes et de lignes pour le style fixé.",
	"ID_SETUP_SHOW_FILENAMES" => "Afficher les noms de fichiers",
	"ID_SETUP_SHOW_FILENAMES_DESC" => "Activer si vous désirez afficher les noms de fichiers sous les miniatures. Ils sont alors affichés si aucune description de l'image n'a été entrée.",
	"ID_SETUP_DISABLE_BOTTOM_NEXTPREV" => "Désactiver les boutons suivante/précédente du bas de la page",
	"ID_SETUP_DISABLE_BOTTOM_NEXTPREV_DESC" => "Cette fonction désactive l'affichage des liens vers les images suivantes et précédentes en bas de la page.",
	"ID_SETUP_COLOR_SETTINGS" => "Paramètres de couleurs:",
	"ID_SETUP_ADD_COLOR_MAP" => "Ajouter une nouvelle carte de couleurs",
	"ID_SETUP_COLOR_DELETE" => "Effacer cette carte de couleurs",
	"ID_SETUP_COLOR_NAME" => "Nom de la carte de couleurs:",
	"ID_SETUP_COLOR_NAME_DESC" => "Ceci est le nom de la carte de couleurs. Si ce n'est pas la dernière carte de couleurs vous pouvez l'effacer.",
	"ID_SETUP_ENABLE_LOGGING" => "Activer le log",
	"ID_SETUP_ENABLE_LOGGING_DESC" => "Cette fonction active l'enregistrement des accès à vos album.",
	"ID_SETUP_LOGS_FILENAME" => "Fichier log:",
	"ID_SETUP_LOGS_FILENAME_DESC" => "Nom du fichier où le log est enregistré",
	"ID_SETUP_LOGS_EXCLUDE" => "Textes à exclure:",
	"ID_SETUP_LOGS_EXCLUDE_DESC" => "Entrez les textes à exclure séparés par des ; (point-virgule). Vous pouvez ainsi exclure du log certaines adresses.",
	"ID_SETUP_CACHE_THUMBNAILS" => "Cache miniatures",
	"ID_SETUP_CACHE_RESIZED_PHOTOS" => "Cache des photos redimensionnées",
	"ID_SETUP_CACHE_THUMBNAILS_DESC" => "Cette option active la mise en cache des miniatures. Ceci est recommandé car il sera plus rapide de charger des miniatures déjà générées plutôt que de les regénérer à chaque visite.",
	"ID_SETUP_CACHE_RESIZED_PHOTOS_DESC" => "Cette option active la mise en cache des photos redimensionnées. Ceci est également recommandé pour une question de rapidité, mais cela nécéssite plus d'espace disque alors soyez vigilant.",
	"ID_SETUP_LOGIN" => "login",
	"ID_USERNAME" => "Pseudo",
	"ID_SETUP_ACT_DIR" => "Répertoire actuel:",
	"ID_SETUP_ACT_DIR_DESC" => "Vous pouvez changer manuelle le répertoire FTP actuel. Il est plus simple d'utiliser les liens dans la liste de fichiers",
	"ID_SETUP_UPLOAD_FILE" => "Envoyer fichier:",
	"ID_SETUP_UPLOAD_FILE_DESC" => "Grâce à ceci vous pouvez facilement envoyer un fichier sur le serveur FTP",
	"ID_UPLOAD" => "Envoyer",
	"ID_SETUP_MAX_SIZE" => "Taille Max:",
	"ID_SETUP_UPLOAD_ZIP_FILE" => "Envoyer un fichier zip:",
	"ID_SETUP_UPLOAD_ZIP_FILE_DESC" => "Grâce a ceci vous pouvez facilement envoyer un fichier zip contenant plusieurs photos ainsi que l'arborescence associée",
	"ID_UPLOAD_ZIP" => "Envoyer zip",
	"ID_SETUP_CREATE_DIR" => "Créer répertoire",
	"ID_SETUP_CREATE_DIR_DESC" => "Ici vous pouvez créer un nouveau répertoire sur le serveur FTP.",
	"ID_CREATE" => "Créer",
	"ID_FILENAME" => "Fichier",
	"ID_SIZE" => "Taille",
	"ID_IMAGE_SIZE" => "Taille de l'image",
	"ID_OWNER" => "Propiétaire",
	"ID_GROUP" => "Groupe",
	"ID_FUNCTIONS" => "Fonction",
	"ID_TIME" => "Date",
	"ID_COMMAND" => "Commande",
	"ID_FILE_DIR" => "Fichier / Répertoire",
	"ID_HOST" => "Host",
	"ID_PATH" => "Chemin",
	"ID_ALIAS" => "Alias",
	"ID_PASSWORDS" => "Mots de passes",
	"ID_SETUP_ENABLE_COMMENTS" => "Activer commentaires",
	"ID_SETUP_ENABLE_COMMENTS_DESC" => "Cette option active la possibilité de laisser des commentaires sur vos photos.",
	"ID_SETUP_COMMENT_QUEUE" => "Taille de la liste d'attente",
	"ID_SETUP_COMMENT_QUEUE_DESC" => "Ici vous pouvez définir le nombre de messages qui seront en attente de confirmation. Les anciens commentaires seront automatiquement approuvés, mais vous pouvez a tout moment effacer des commentaires sous le images.",
	"ID_SETUP_COMMENT_APPROVING_DESC" => "Ici apparaissent tous les commentaire en attente de confirmation. Approuver un commentaire l'enlèvera de la file d'attente mais le commentaire sera toujours visible sous l'image. Effacer un commentaire ici l'effacera également de sous l'image :",
	"ID_SETUP_NEW_COMMENTS" => "Nouveaux commentaires",
	"ID_SETUP_ENABLE_ECARD" => "Active les e-cartes",
	"ID_SETUP_ENABLE_ECARD_DESC" => "Cette option active la possibilité d'envoyer des e-carte depuix votre album",
	"ID_SETUP_ECARD_SUBJECT" => "Sujet de l'email",
	"ID_SETUP_ECARD_SUBJECT_DESC" => "Ce texte est utilisé comme sujet de l'e-mail de transmission des e-cartes",
	"ID_SETUP_ECARD_PICKED_SUBJECT" => "Sujet du mail carte lue!",
	"ID_SETUP_ECARD_PICKED_SUBJECT_DESC" => "Ce texte sera utilisé comme sujet de mail transmis losrque l'e-carte de l'expéditeur est lue",
	"ID_SETUP_ECARD_TEXT" => "Texte du mail de l'e-carte",
	"ID_SETUP_ECARD_TEXT_DESC" => "Ceci est le message envoyé par mail. Vous pouvez utiliser différents paramètres comme #TO_NAME, #TO_EMAIL, #FROM_NAME, #FROM_EMAIL, #DATE, #TIME, #ECARD_ADRESS, #IMAGE_ADRESS",
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
	"ID_SETUP_USERNAME_DESC" => "Entrez le pseudo désiré. Un message d'erreur vous avertira si ce pseudo existe déjà.",
	"ID_RETYPE_PASSWORD" => "Ré-entrez le mot de passe",
	"ID_SETUP_EMAIL" => "Adresse email:",
	"ID_SETUP_EMAIL_DESC" => "Entrez votre adresse email, celle-ci ne sera pas publiée.",
	"ID_SETUP_HOMEPAGE" => "Page perso",
	"ID_SETUP_HOMEPAGE_DESC" => "Ceci est l'adresse de votre page perso, elle sera publiée avec vos commentaires.",
	"ID_SETUP_REGISTER_NEW_USER" => "Enregistrer",
	"ID_THANKS_FOR_REGISTER" => "Merci de vous être enregistrés",
	"ID_SETUP_DELETE_ERROROLOG" => "Effacer le log",
	"ID_SETUP_ADD_GROUP" => "Ajouter un groupe d'utilisateurs",
	"ID_SETUP_NEW_GROUP_NAME" => "Nom du nouveau groupe:",
	"ID_SETUP_ADD_GROUP_DESC" => "Entrez un nom de group et cliquez sur le bouton. Ceci créera un nouveau groupe auquel vous pourrez ensuite associer des albums et des utilisateurs",
	"ID_SETUP_SHOW_DIRS" => "Afficher les galeries associées",
	"ID_SETUP_SHOW_USERS" => "Afficher les utilisateurs",
	"ID_USER" => "Utilisateurs",
	"ID_EDIT" => "Editer",
	"ID_ID" => "Id",
	"ID_NOT_POSSIBLE" => "Impossible",
	"ID_SETUP_ADD_NEW_PARAM" => "Ajouter un paramètre",
	"ID_SETUP_ADD_PARAM_DESC" => "Entrez le nom du nouveau paramètre et sélectionnez le type de paramètre.<ul><li><b>User value</b> - Valeur texte définie par l'utilisateur</li><li><b>User list of values</b> - Liste de valeurs prédéfinies par l'utilisateur pouvant être choisies pour chaque photo</li><li><b>System value</b> - Vous pouvez alors sélectionner comme valeur par défaut des paramètres images comme les dimensions, tailles, date, nom de fichier, ...</li></ul>",
	"ID_SETUP_PARAM_NAME" => "Nom du paramètre",
	"ID_SETUP_PARAM_NAME_DESC" => "Entrez le nom du nouveau paramètre si vous désirez le changer. Si vous effacez le paramètre ici, il le sera également sous chaque image alors soyez prudents.",
	"ID_SETUP_DELETE_PARAM" => "Effacer paramètre",
	"ID_SETUP_PARAM_DEFAULT" => "Valeur par défaut:",
	"ID_SETUP_PARAM_DEFAULT_DESC" => "Ici vous pouvez entrer une valeur par défaut pour ce paramètre au cas où le paramètre photo n'existe pas.",
	"ID_ALLOW_HTML" => "Activer les codes HTML (pas de filtrage possible)",
	"ID_SETUP_PARAM_SYS_DEFAULT" => "Valeur auto:",
	"ID_SETUP_PARAM_SYS_DEFAULT_DESC" => "Choisissez la valeur à afficher pour ce paramètre",
	"ID_SETUP_EDIT_LOV" => "Editer la liste des valeurs",
	"ID_SETUP_DELETE_LOV" => "Effacer valeur",
	"ID_NOT_DEFINED" => "NOT DEFINED",
	"ID_ADD_NEW_VALUE" => "Ajouter une valeur",
	"ID_SETUP_ACCOUNT_GROUP_DESC" => "Choisissez un ou des groupes à associer avec cet utilisateur",
	"ID_SETUP_GALLERY" => "Galerie:",
	"ID_SETUP_GALLERY_DESC" => "Choisissez la galerie à éditer. Si la galerie n'apparait pas, rescannez les répertoires avec le lien ci-dessous...",
	"ID_SETUP_ALIAS" => "Nom alias:",
	"ID_SETUP_ALIAS_DESC" => "Entrez un nom d'alias qui sera affiché à la place du nom du répertoire",
	"ID_SETUP_DESC" => "Courte description:",
	"ID_SETUP_DESC_DESC" => "Cette courte description du répertoire sera affichée sous la miniature/logo du répertoire",
	"ID_SETUP_PIC_DESC_DESC" => "Ceci est une courte description de l'image, elle peut-être affichée sous la miniature de l'image.",
	"ID_SETUP_LONG_DESC" => "Description complète:",
	"ID_SETUP_LONG_DESC_DESC" => "Entrez une description plus exhaustive pour ce répertoire. Vous pouvez également utiliser du code HTML. Pour une nouvelle ligne tapez &lt;br&gt;.",
	"ID_SETUP_PIC_LONG_DESC_DESC" => "Entrez une description plus exhaustive pour cette image. Vous pouvez également utiliser du code HTML. Pour une nouvelle ligne tapez &lt;br&gt;.",
	"ID_SETUP_SORTING" => "Classement:",
	"ID_SETUP_SORTING_DESC" => "Choisissez un ordre de classement pour les images de ce répertoire. Défaut signifie que le type de classement défini en configuration générale sera utilisé.",
	"ID_SETUP_VISIBLE" => "Visible",
	"ID_SETUP_VISIBLE_DESC" => "Détermine si le répertoire sera ou non affiché",
	"ID_SETUP_ACCESS_RIGHTS" => "Droits d'accès",
	"ID_SETUP_GALLERY_GROUP_DESC" => "Choisissez des groupes si vous voulez restreindre l'accès à certains groupes. Les options désacivées sont héritées des galeries parentes vous ne pouvez donc pas les modifier ici mais dans les galeries respectives.",
	"ID_SETUP_GALLERY_PARAMS_DESC" => "Selectionnez les paramètres que vous voulez afficher avec les images. Pour définir plus de paramètre rendez-vous dans la section Param photos.",
	"ID_SETUP_SHOW_CUSTOM_PARAMS" => "Afficher les paramètres personalisés",
	"ID_SETUP_SHOW_DEFAULT_PARAMS" => "Afficher les paramètres par défaut",
	"ID_SETUP_PARAMS_DEFAULT_CUSTOM_DESC" => "Choisissez si vous désirez afficher les paramètres par défaut ou une sélection de paramètres personnalisés sous chaque image de cette galerie.",
	"ID_SETUP_SHOW_PARAMS" => "Personnalisés ou défaut:",
	"ID_NO_DEFINED_PARAMS" => "Aucun paramètre défini",
	"ID_SETUP_NEXT_SCAN" => "Prochain scan automatique des répertoires: %s",
	"ID_SETUP_SCAN_DIRS" => "Scanner les répertoire maintenant!",
	"ID_DEFAULT_DISPLAYED" => "Affichage par défaut",
	"ID_SETUP_PARAM_DEFAULT_DISPLAYED_DESC" => "Cochez cette option si vous désirez afficher ce paramètre par défaut. C'est à dire dans toutes les galeries pour lesquel les paramètres par défaut sont sélectionnés.",
	"ID_HTML_NOT_ALLOWED" => "Le code HTML n'est pas autorisé",
	"ID_HTML_ALLOWED" => "Le code HTML est autorisé",
	"ID_DEFAULT_VALUE" => "La valeur par défaut est <b>%s</b>",
	"ID_NO_DEFAULT_VALUE" => "Aucune valeur par défaut",
	"ID_DEFAULT" => "Défaut",
	"ID_SETUP_THEME_BORDERS" => "Bordure des images et miniatures",
	"ID_SETUP_THEME_PIC_BORDER_SIZE" => "Taille de la bordure des images",
	"ID_SETUP_THEME_THMB_BORDER_SIZE" => "Taille de la bordure des miniatures",
	"ID_SETUP_THEME_DISPLAY_SHADOWS" => "Afficher l'ombre",
	"ID_SETUP_THEME_DISPLAY_SHADOWS_DESC" => "Si cela est supporté par le thème cette option affiche une ombre derrière les images et miniatures.",
	"ID_SETUP_THEME_PIC_BORDER_SIZE_DESC" => "Entrez la largeur de la bordure autour des images (en px)",
	"ID_SETUP_THEME_THMB_BORDER_SIZE_DESC" => "Entrez la largeur de la bordure autour des miniatures (en px)",
	"ID_SETUP_WATERMARK_FILE" => "Fichier signature",
	"ID_SETUP_WATERMARK_FILE_DESC" => "Sélectionnez un fichier png qui sera ajouté comme signature sur les images redimensionnées.",
	"ID_NO_WATERMARK" => "Aucun fichier signature sélectionné",
	"ID_SETUP_WATERMARK_POSITION" => "Position de la signature",
	"ID_SETUP_WATERMARK_POSITION_DESC" => "Choisissez une position pour la signature sur l'image",
	"ID_SETUP_DIR_LOGO_STYLE" => "Style des icônes de répertoires",
	"ID_SETUP_DIR_LOGO_STYLE_DESC" => "Choisissez comment les répertoires sont affichés, avec une icône de répertoire ou avec une miniature avec une taille normale ou spécifiée.",
	"ID_SETUP_DIR_LOGO_STYLE_LOGO" => "Icône de répertoire",
	"ID_SETUP_DIR_LOGO_STYLE_PIC1" => "Miniature (même taille que les miniatures)",
	"ID_SETUP_DIR_LOGO_STYLE_PIC2" => "Miniature (taille spécifiée)",
	"ID_USE_FOR_LOGO" => "Utiliser comme icône du répertoire",
	"ID_SETUP_ADD_THMB_HEIGHT" => "Hauteur de miniature additionnelle",
	"ID_SETUP_ADD_THMB_WIDTH" => "Largeur de miniature additionnelle",
	"ID_SETUP_ADD_THMB_HEIGHT_WIDTH_DESC" => "Augmentez cette valeur si vous utilisez plus de ligne pour la description des albums ou des photos. Ceci créera alors plus d'espace sous les miniatures en mode fluide car cela peut causer des problèmes d'affichage.",
	"ID_SETUP_SHARPEN_WITH_PARAM" => "Activer la netteté avec les paramètres suivants:",
	"ID_SETUP_AMOUNT" => "Niveau",
	"ID_SETUP_RADIUS" => "Rayon",
	"ID_SETUP_TRESHOLD" => "Seuil",
	"ID_SETUP_SHARPEN_DESC" => "Vous pouvez activer la netteté des miniatures qui sont généralement lissées après redimensionnement. <b>Soyez prudents car cela peut affecter les performances</b>.",
	"ID_SETUP_SHARPEN_THMB" => "Renforcer la netteté des miniatures",
	"ID_SETUP_INFO_THMB" => "Afficher sous les miniatures:",
	"ID_SETUP_INFO_THMB_DESC" => "Choisissez les informations à afficher sous les miniatures.",
	"ID_SETUP_INFO_THMB_VIEWS" => "Nombre de vues",
	"ID_SETUP_INFO_THMB_COMMENTS" => "Nombre de commentaires",
	"ID_SETUP_INFO_THMB_VOTES" => "Status des votes",
	"ID_SETUP_DATE_FORMAT" => "Format Date/Heure",
	"ID_SETUP_DATE_FORMAT_DESC" => "Paramétrez le format de Date/Heure que vous souhaitez utiliser. Utilise le standard PHP de la fonction date().",
	"ID_SETUP_PRIVILEGES" => "Privilèges",
	"ID_SETUP_PRIVILEGES_DESC" => "Ici vous pouvez paramétrer quel groupe accède à quelle fonction de configuration. Le vert indique que l'accès est autorisé et le rouge que l'accès est interdit pour le groupe concerné. Cliquez sur le lien pour permettre ou interdire les accès.<br/><br/>Dans la colonne défaut vous pouvez définir dans quel groupe seront automatiquement assignés les nouveaux utilisateurs.",
	"ID_DISABLE_ERROR_LOG" => "Désactiver le log des erreurs",
	"ID_SETUP_ENABLE_ANTISPAM" => "Activer l'anti-spam",
	"ID_SETUP_ENABLE_ANTISPAM_DESC" => "Active l'image anti-spam. Ceci rend difficile l'envoi automatique de spam sur les commentaires de vos images.",
	"ID_SETUP_PUBLISH_ONLY_APPROVED" => "Publier seulement les commentaires approuvés.",
	"ID_SETUP_PUBLISH_ONLY_APPROVED_DESC" => "Si cette option est cochée, seuls les commentaires approuvés seront publiés.",
	"ID_SETUP_THEME_NEWEST_COUNT" => "Nombre de nouvelles photos",
	"ID_SETUP_THEME_NEWEST_COUNT_DESC" => "Entrez le nombre de nouvelles photos qui seront affichées sur la première page (si le thème le permet)",
	"ID_SETUP_USE_IPTC_DESC" => "Utiliser la description IPTC",
	"ID_SETUP_USE_IPTC_DESC_DESC" => "Si cette option est cochée, lorsque les images sont scannées pour la première fois les paramètres IPTC sont automatiquement utilisés comme descriptions courtes et longues des images.",
	"ID_IMAGEORIG" => "Téléchargement d'images",
	"ID_IMAGEVIEW" => "Vue des images",
	"ID_PHOTONOTES" => "PhotoNotes",
	"ID_SEARCHENGINE" => "SearchEngine",
	"ID_SETUP_SHOW_SEARCH_BOX" => "Afficher la boite de recherche",
	"ID_SETUP_SHOW_SEARCH_BOX_DESC" => "Cette option active ou désactive l'affichage de la boite de recherche. Actuellement la recherche ne fonctionne que pour les mots-clefs importés des IPTC.",
	"ID_SETUP_TRACKING_CODE" => "Tracking code",
	"ID_SETUP_TRACKING_CODE_DESC" => "Vous pouvez entrer ici des tracking code (comme pour Goggle Analytics ou Xiti) qui seront affichés sur chaque page.",
	"ID_SETUP_THEME_CUSTOM_PARAMETERS" => "Custom theme parameters",
	"ID_FILESYSTEM_CHARSET" => "Filesystem Character set",
	"ID_FILESYSTEM_CHARSET_DESC" => "Here you can select character set of your filesystem, in most cases it is ISO8859-1 or UTF-8. If you don't know it, ask your administrator.'",
	"ID_MSG_DIR_NOT_EXISTS" => "Le répertoire %S n'existe pas, changez ça!",
	"ID_MSG_DIR_NOT_WRITABLE" => "Le répertoire %s n'est pas accessible en écriture, changez ces droits avec CHMOD !",
	"ID_MSG_FILE_NOT_EXISTS" => "LE fichier %s ne peut être trouvé",
	"ID_FILE_WAS_DELETED" => "Le fichier %s a été effacé",
	"ID_MSG_SETUP_FTP" => "Allez sur l'onglet de configuration générale et entrez un serveur FTP ainsi que le répertoire FTP contenant vos photos afin d'utiliser ce service.",
	"ID_MSG_FTP_SUPPORT" => "La fonction FTP n'est pas supportée! Vous ne pouvez utiliser ce service, demandez à votre fournisseur d'accès de l'activer ou de l'installer.",
	"ID_MSG_FTP_UNABLE_CONNECT" => "Impossible de se connecter au serveur %s",
	"ID_MSG_FTP_INVALID_LOGIN" => "Pseudo ou mot de passe invalide!",
	"ID_MSG_FTP_PASSIVE_MODE" => "Impossible de passer en mode FTP passif sur le serveur",
	"ID_MSG_FTP_UNABLE_CHDIR" => "Impossible de changer vers le répertoire %s",
	"ID_MSG_FTP_PHOTO_DIR" => "Le répertoire photo FTP pointe vers un autre répertoire, pas vers les photos.",
	"ID_MSG_FTP_UNABLE_DELETE" => "Impossible de supprimer le fichier %s sur le serveur FTP",
	"ID_MSG_FTP_UNABLE_UPLOAD" => "Impossible d'envoyer le fichier %s !",
	"ID_MSG_FTP_UNABLE_OPEN_TMP" => "Impossible d'ouvrir le fichier temporaire !",
	"ID_MSG_FTP_UNABLE_MKDIR" => "Impossible de crée le répertoire %s sur le serveur FTP",
	"ID_MSG_FTP_UNABLE_RMDIR" => "Impossible de supprimer le répertoire %s sur le serveur FTP !",
	"ID_MSG_FTP_NOT_ZIP" => "Le fichier n'est pas un zip ni un format supporté!",
	"ID_MSG_FTP_ZIP_UNSUPPORTED" => "La fonction ZIP n'est pas installée!",
	"ID_MSG_FTP_FILE_UPLOAD_ATTACK" => "Possible file upload attack!",
	"ID_MSG_PASSWORD_ERROR" => "Le mot de passe retapé est différent du premier. Le mot e passe est inchangé!",
	"ID_MSG_EMAIL_REQUIRED" => "L'adresse e-mail oit être entrée. Entrez votre adresse e-mail, elle ne sera pas publiée sur le site.",
	"ID_MSG_USERNAME_EXISTS" => "Le pseudo <b>%s</b> existe déjà!",
	"ID_MSG_PASSWORD_REQUIRED" => "Mot de passe requis!",
	"ID_MSG_GROUP_EXISTS" => "Le groupe <b>%s</b> existe déjà!",
	"ID_MSG_PARAM_EXISTS" => "Le paramètre <b>%s</b> existe déjà!",
	"ID_MSG_PARAM_MANDATORY" => "Le nom du paramètre est obligatoire!",
	"ID_MSG_USERNAME_MANDATORY" => "Le pseudo est obligatoire!",
	"ID_MSG_MBSTRING_MISSING" => "You are missing MBSTRING module, this is only problematic if you are using different character string encoding for your filesystem and in your language setting. Please correct one of this settings or install/enable MBSTRING PHP module. If you can't do it, just be sure that your directory and file names does not include special characters.",
); return $pa_texts; }