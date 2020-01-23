#!/bin/bash bash

RED='\033[0;31m'
NC='\033[0m' # No Color

echo "Updating git repository $1 / $2"

git fetch origin
git reset --hard origin/master

echo 'Starting build...'

docker build --build-arg VERSION="$2" --tag appwrite/appwrite:"$1" .

echo 'Pushing build to registry...'

docker push appwrite/appwrite:"$1"
