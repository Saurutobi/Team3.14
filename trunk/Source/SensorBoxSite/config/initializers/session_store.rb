# Be sure to restart your server when you modify this file.

# Your secret key for verifying cookie session data integrity.
# If you change this key, all old sessions will become invalid!
# Make sure the secret is at least 30 characters and all random, 
# no regular words or you'll be exposed to dictionary attacks.
ActionController::Base.session = {
  :key         => '_SensorBoxSite_session',
  :secret      => '176fdb718d70704114c18fbb2cd7ccd973ff5234f8b45b60e830763e43247608d868fa90c1061b36646f97334a83ce3350b32f704993afbce756d6febab42d8c'
}

# Use the database for sessions instead of the cookie-based default,
# which shouldn't be used to store highly confidential information
# (create the session table with "rake db:sessions:create")
# ActionController::Base.session_store = :active_record_store
