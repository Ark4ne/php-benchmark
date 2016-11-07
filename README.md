# php-benchmark
Php framework benchmark

### Frameworks
* invo (phalcon, fullstack)
* laravel (fullstack)
* lumen (micro)
* luxury (phalcon, fullstack)

### Benchmark Command 
ab -c 10 -t 10 -l

### Benchmarking Environment
#### Software
* Ubuntu 16.04.1 LTS
  * PHP 7.0.8-0ubuntu0.16.04.3 (fpm-fcgi)
    * Zend OPcache v7.0.8-0ubuntu0.16.04.3
  * nginx/1.10.0
#### Hardware
* Virtual Machine on VMWare
* 4 vCore, Hardware CPU: i7-6700HQ 6M Cache, up to 3.50 GHz 4 cores 8 threads
* 3GB vRAM, Hardware RAM: 8GB DDR4 2133 MHz
* 20GB on SSD 120GB Read 560MB/s Write 160MB/s

### Result
|framework          |requests/s|memory (avg)|render time (avg)|
|-------------------|---------:|-----------:|----------------:|
|luxury (phalcon)   |  3,401.60|        418K|          0.909ms|
|invo (phalcon)     |  2,797.28|        423K|          1.202ms|
|lumen (micro)      |  2,363.46|        798K|          2.339ms|
|slayer (phalcon)   |    404.65|      1.489M|         12.601ms|
|laravel            |    394.76|      2.153M|         16.118ms|
