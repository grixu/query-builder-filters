# Changelog

All notable changes to `query-builder-filters` will be documented in this file

## 1.2.1 - 2021-11-18

- Fixed auto-merging on dependabot's updates
- `commit-msg` regex updated
- Fixed names of jobs & slack notifications in pipelines

## 1.2.0 - 2021-11-17

- Added `composer-git-hooks`
- Configured hooks with auto-install/update
- Added timeouts in pipelines
- Added  auto-merge pipeline for small updates made by dependabot
- Added `x-ray`
- Added `x-ray` checking in CI pipeline
- Added `x-ray` checking in git hooks
- Added `changelog-updater-action` to CD pipeline

## 1.1.1 - 2021-11-08

- Updated Larastan to `1.0.1`
- Prepared CI pipeline to change from `master` to `main` as default branch
- Updated `laravel-query-builder` to `4.0.0`

## 1.1.0 - 2021-10-28

- Added code quality tools such as PHP_CS_Fixer, PHP Insights & PHPStan
- Added scanning & formatting code with those tools in CI pipeline
- Applied formatting on code base

## 1.0.3 - 2021-03-03

- Bugs fixed in IsNullFilter & NotNullFilter

## 1.0.2 - 2021-02-15

- Added checking for empty strings in `IsNullFilter` and `IsNotNullFilter`

## 1.0.1 - 2021-02-02

- Added compatibility with PHP8

## 1.0.0 - 2020-12-01

- initial release
