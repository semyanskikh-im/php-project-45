install:
	composer install

validate:
	composer validate

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-gcd:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression

brain-prime:
	./bin/brain-prime

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
