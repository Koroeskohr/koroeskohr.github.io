#!/bin/bash
git add .
git commit -m "$1"
git push origin master
cd ../../../github.io/Koroeskohr.github.io
./gith.sh
