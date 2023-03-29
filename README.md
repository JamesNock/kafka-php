# Basic Kafka Demo

This repo contains a basic working demo of kafka with PHP. It contains a `kafka-consumer` folder and a `kafka-producer` folder. The `kafka-consumer` 'consumes' events and the `kafka-producer`, er-hum, produces them. These two containers share a network (`kafka-shared`) so that they can communicate with each-other.

## Installation

1. Clone this repo
2. Navigate to the project root in your terminal
3. Run the consumer and producer containers (you may want to do this in different terminal windows)
    - `cd kafka-consumer && docker-compose up`
    - `cd kafka-producer && docker-compose up`

## Usage

1. SSH onto the `kafka-producer` container and run a composer install:

   - `docker exec -it kafka-producer /bin/bash`
   - `composer install`

2. Send an event by running `php index.php`

3. In another terminal run `kcat -C -K : -b kafka:9092 -t helloworld` to see the event that you pushed from the producer container.

   (If you don't have `kcat` installed, run `brew install kcat`)

4. With `kcat` still running, head back over to your `kafka-producer` terminal and run `php index.php` again. You'll see another almost-identical event added to the queue.

5. Inspect the contents of the `index.php` file to see where the event came from.
