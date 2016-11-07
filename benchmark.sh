#!/usr/bin/env bash

mkdir ./.datas > /dev/null 2> /dev/null
rm ./.datas/*.* > /dev/null 2> /dev/null

bench(){

    fw="$1"
    echo "$fw"
    ab_log="/var/www/php-benchmark/.datas/$fw.ab.log"

    cd ./"$fw"

    echo "Composer update & optimize"
    sh update.sh > /dev/null 2> /dev/null

    echo "php-fpm restart (reset opache)"
    service php7.0-fpm restart

    echo "bench..."
    ab -c 10 -t 10 -l http://"$fw".bench.com/ > "$ab_log" 2> /dev/null

    cd ./../
    php ./php-benchmark/libs/parse_result.php "$fw"
    php ./php-benchmark/libs/display_result.php "$fw"
}

echo "Benchmark"

for var in "$@"
do
    bench $var
done