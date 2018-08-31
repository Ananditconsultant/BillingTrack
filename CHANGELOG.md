# FusionInvoiceFOSS Change Log

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) and this project adheres to [Semantic Versioning](http://semver.org/).

## 4.0.0

- change server to public directory (requires apache change)
- configure from .env (copy .env.example to .env and change required variables)
- clean, consolidate and restructure mysql database
- transfer existing 2018-8 database to new structure upon setup
- move sortables to server side datatables
- implement softdeletes, with trash management
- update to laravel 5.6.*
- update all resources
- add toolbox
- add products
- add employees
- item lookup modal in quotes and invoices
- extend skin configuration
- integrate timetracking (projects/tasks/timers)
- integrate workorders 
- integrate Scheduler