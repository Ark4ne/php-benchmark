# php-benchmark
Php framework benchmark

## Frameworks
* invo (phalcon v3.0.1, fullstack)
* slayer v1.4 (phalcon v3.0.1, fullstack)
* laravel v5.3 (fullstack)
* lumen v5.3 (micro)
* luxury (phalcon v3.0.1, fullstack)

## Benchmark Command 
ab -c 10 -t 10 -l

## Benchmarking Environment
### Software
* Ubuntu 16.04.1 LTS
  * PHP 7.0.8-0ubuntu0.16.04.3 (fpm-fcgi)
    * Zend OPcache v7.0.8-0ubuntu0.16.04.3
  * nginx/1.10.0
### Hardware
* Virtual Machine on VMWare
* 4 vCore, Hardware CPU: i7-6700HQ 6M Cache, up to 3.50 GHz 4 cores 8 threads
* 3GB vRAM, Hardware RAM: 8GB DDR4 2133 MHz
* 20GB on SSD 120GB Read 560MB/s Write 160MB/s

## Result
![Benchmark Results Graph](https://s15.postimg.org/gnsytrhi3/bench_res.png:large)

|framework          |requests/s|memory (avg)|render time (avg)|
|-------------------|---------:|-----------:|----------------:|
|luxury (phalcon)   |  3,401.60|        418K|          0.909ms|
|invo (phalcon)     |  2,797.28|        423K|          1.202ms|
|lumen (micro)      |  2,363.46|        798K|          2.339ms|
|slayer (phalcon)   |    404.65|      1.489M|         12.601ms|
|laravel            |    394.76|      2.153M|         16.118ms|

## References
* [Laravel](http://laravel.com/) ([@laravelphp](https://twitter.com/laravelphp))
* [Lumen](http://lumen.laravel.com/)
* [Phalcon](http://phalconphp.com/) ([@phalconphp](https://twitter.com/phalconphp))
* [Slayer](https://phalconslayer.com/)
* [Luxury](https://github.com/Ark4ne/phalcon-luxury)