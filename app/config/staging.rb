server 'qlif.atc-it.fr', :app, :web, :primary => true
set :domain,      "qlif.atc-it.fr"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where symfony migrations will run

set :current_env, "qlif"
