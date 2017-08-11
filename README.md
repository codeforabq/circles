# Circles USA Cliff Effect Planning Tool (CEPT)

[Circles USA](http://www.circlesusa.org) is a non-profit organization that aims to help individuals and families rise out of poverty.

Part of the problem of rising out of poverty is the "cliff effect" ([more information on the cliff effect](http://www.circlesusa.org/cliff-effect/)), a phenomenom that occurs when families trying to come out of poverty dramatically lose to benefits and subsidies for food, housing, child care, etc as their income increases. Caused by a variety of factors, the end result is that those trying to come out of poverty can lose so much spending power that they are forced back into poverty.

The tool in this repository, the *Cliff Effect Planning Tool* (CEPT), is a tool to help individuals trying to come out of poverty determine when they will fall off this cliff such that they can better plan for it.

It works by collecting several self-reported items of budget and life information, looking up the relevant information in various tables about at what point subsidies and aid go away. All of the information is graphed such that folks can visually see where aid goes away as their income increases,

Insert screenshot of graph here.

Some terminology: those individuals or families Circles USA works with to help out of poverty are called *Circle Leaders*. Circles USA volunteers who help those individuals are called *advocates*. The Cliff Effect Planning Tool is meant not to be used by Circle Leaders by themselves, but by both Circle Leaders and Advocates together to help Circle Leaders plan their budgets.

At the moment, the tool is mostly a prototype written by Vince Gonzales, Circles USA board member. There are several goals we help to accomplish working on the CEPT as a Code for Albuquerque project:

 * Be able to save the data points entered into some kind of persistent storage tied to the Circle Leader. The ideal goal is to save this information with the Customer Relationship Management (CRM) tool Circles USA already uses, called EveryAction (see below). An explicit goal is to not create more IT headaches by saving into another data silo like a custom MySQL server that must be secured, hosted, and managed by somebody.
 * Allow Circle Leaders to browse information that had been entered in the past.

In addition:

 * Refactor codebase to make it easier to add/remove questions and data points that are collected
 * Make it easier to import new lookup tables, which must be maintained updated (on a time frame of quarterly to yearly basis)
 * Remove [unnecessary IT dependencies (e.g. MySQL server. It only stores static lookup tables -- why is a database server needed?)
 * Separate display of questions, collection of data points, and calculations, which currently all munged together in PHP, into logical units separating all of this functionality. Best to use best-of-breed tools/frameworks for each task.

Browse this repositories issues to see what specific technical steps we're taking to accomplish the above goals.

# Integration with EveryAction

Circles USA uses a Customer Relation Manager (CRM) called EveryAction.
It's a complex product tailored for non-profits, based on voter management systems used by the Clinton and Obama campaigns, commercialized into a product called [VAN](https://en.wikipedia.org/wiki/NGP_VAN).

More information for developers is available at [EveryAction's Developer Portal](http://developers.everyaction.com/).

Interesting stuff:

 * Python example: https://github.com/leosquared/actionkit_van_sync/blob/6df9a87a9f8ae4e2225a77555101ce4282dc02c7/api_test.py
 * Ruby wrapper: https://github.com/christopherstyles/ngp_van

# Copyright information

Copyright © 2016-2017 Vince Gonzales. All rights reserved.

Contents of this repository is available for your use under the Affero GPL (AGPL) v3 or later, unless otherwise specified.

Not all code in this repository is AGPL; `hi_c_js` directory contains a copy of High Charts, of which you will need to obtain your own license.


# Form Flow
1. `Welcome.php`
2. `cl_infos.php`
	* `cl_state is the fullname of the state`
	* `cl_stateinits is the initials of the state`

10. `cl_results.php`
