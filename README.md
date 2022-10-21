bin/console doctrine:query:sql "INSERT INTO users VALUES (NULL, 'admin', 'admin@orangeblue.com', '\$argon2id\$v=19\$m=65536,t=4,p=1\$fy4R2VdGKR7CiJtCTnanOQ\$j4vnYxc9TqSOk+d5bYYYz/fi2EEGWTdTuI784b5ZW3I', '["ROLE_TECH"]');" => mdp = admin

sécurité : connextion :
avec email (donc unique)
on récupère le password (hash et salf tout ça)
et on ajoute un badge, qui est un tableau qui contient le CSRF token, qui est un jeton de sécurité qui permet de vérifier que le formulaire vienne bien de notre site)

symfony cast verify email pour envoyer un courriel
