#!/bin/sh

echo "Введите название БД:"
read DB
 
echo "Введите пароль пользователя root базы данных:"
read ROOTPASS
 
echo "1 - экспорт, 2 - импорт [по умолчанию 1]"
read MODE

#cd ../dumps
 
if [ "$MODE" = "2" ]; then
    echo "Импорт..."
	
	echo "Уничтожение и создание БД $DB"
	Q1="DROP DATABASE IF EXISTS $DB;"
	Q2="CREATE DATABASE IF NOT EXISTS $DB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;"
	SQL="${Q1}${Q2}"
	mysql -uroot -p$ROOTPASS -e "$SQL"
	echo "Процесс импорта"
	gunzip < $DB.sql.gz | mysql -uroot -p$ROOTPASS $DB
else
	echo "Экспорт базы $DB ..."
	rm -f $DB.sql.gz
	mysqldump -uroot -p$ROOTPASS --routines --single-transaction $DB | gzip > $DB.sql.gz
fi
 
echo "Готово"
exit
