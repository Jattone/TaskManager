export

SAIL := ./vendor/bin/sail

# Run containers
up:
	@$(SAIL) up -d

# Key generate
key:
	@$(SAIL) artisan key:generate

# Run migrations
migrate:
	@$(SAIL) artisan migrate

chown:
	@$(SAIL) chown

# Run migrations
migrate-seed:
	@$(SAIL) artisan migrate:fresh --seed -n --force

# Install sail and composer.
sail:
	docker run --rm \
		-u "$$(id -u):$$(id -u)" \
		-v $$(pwd):/opt \
		-w /opt \
		laravelsail/php81-composer:latest \
		composer install --ignore-platform-reqs


# Install backend
composer-install:
	@$(SAIL) composer install

# Setup project
setup: sail up key

# Run project
start: up composer-install migrate-seed
