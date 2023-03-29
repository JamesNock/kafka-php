<?php

require __DIR__ . '/vendor/autoload.php';

use Enqueue\RdKafka\RdKafkaConnectionFactory;

$connectionFactory = new RdKafkaConnectionFactory([
	'global' => [
		'metadata.broker.list' => 'kafka:9092',
	]
]);

$context = $connectionFactory->createContext();

$msg = $context->createMessage(
	json_encode([
		'tag' => 'hey',
		'body' => 'there',
		'ts' => date('Y-m-d_H:i:s')
	])
);

$topic = $context->createTopic('helloworld');

try {
	$context->createProducer()->send($topic, $msg);
	echo "Message sent...", PHP_EOL;
} catch (Exception $e) {
	echo $e, PHP_EOL;
}

echo PHP_EOL;
