#!/bin/sh
cat <<EOF
Content-Type: text/html; charset=utf-8

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Page HTML dynamique indiquant la date</title>
</head>
<body>
Voici la date d'aujourd'hui :
<br />
EOF
date
echo '</body></html>'