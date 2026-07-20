#!/bin/bash
set -e

PROJECT_DIR="$(cd "$(dirname "$0")" && pwd)"
cd "$PROJECT_DIR"

if [ ! -f "composer.json" ]; then
  echo "Erreur : composer.json introuvable dans $PROJECT_DIR"
  exit 1
fi

if ! command -v php >/dev/null 2>&1; then
  echo "PHP n'est pas installé ou introuvable dans PATH."
  exit 1
fi

php spark serve --host=0.0.0.0 --port=8080
