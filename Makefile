.PHONY: install install-js install-php check fix build test debug

install: install-js install-php

install-js: node_modules pnpm-lock.yaml

node_modules: package.json packages/ui/package.json
	pnpm i -r

pnpm-lock.yaml: package.json packages/ui/package.json
	pnpm up -r

install-php: vendor composer.lock

vendor: composer.json
	composer i

composer.lock: composer.json
	composer up

check: install
	pnpm check
	composer check

IS_CI ?= $(CI)

fix: install
	pnpm fix
	[ "$(IS_CI)" != "true" ] && composer fix || true

build: fix
	pnpm build

test: install
	pnpm test
	composer test

debug: install
	pnpm debug
	composer debug
