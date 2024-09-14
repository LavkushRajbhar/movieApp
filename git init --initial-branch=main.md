git init --initial-branch=main
git remote add origin https://github.com/LavkushRajbhar/movieApp.git
git add .
git commit -m "Initial commit"
git push --set-upstream origin main

git pull https://github.com/LavkushRajbhar/movieApp.git main

git branch -set-upstream origin main

git config --local user.name "pawan vishwakarma"
git config --local user.email "pawanrajjnp12345@gmail.com"
