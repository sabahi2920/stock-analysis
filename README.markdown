# Stock Analysis Project

live demo: https://stockanalysis.web.illinois.edu

### Project Description:
Stock analysis is a portfolio management website that
provides information about allows users to add stocks and how many of each they would like
to add to their portfolio. Users can perform search by portfolio name and can also edit and
delete portfolios from the web interface. In addition to that, thanks to our advanced functions,
users can see the potential growth of their portfolio in addition get recommendations based on
an algorithm that weighs stock relationship metrics to find which stocks would be good buys.

#### Functionality of application (feature specs)

* User register
* User sign in
* Manage portfolios (insert, modify, delete)
* Search portfolios (by name)
* Recommended stocks in the sector of the stock you are looking at
* Graphs to show the growth of the portfolio over 2 years using historical data
* About section to familiarize the user with the company
* Graphs to show the growth of every stock in the portfolio
* Table to show the top 5 recommended stocks based on our very own value assessment
algorithm

### Usefulness:
The website allows users to add and customize their portfolios and also will show projected
growth of the portfolio over two years, which most stock management apps do not offer. In
addition to this our website also features a recommended stocks list that will find the best
stocks for them based on an algorithm that will weigh metrics to find the best valued stocks.

### Discussion of our data:
We got the data for our stocks from the Financial Modeling Prep API. The API makes many
different calls to fetch the “12 month trailing metrics”, “daily values” and “company’s
profile”. These calls are then stored to our database in a few different tables. The
“dailyValues” table contains information about the daily close price of 82 different stocks for
the past 2 years. The “ttmValues” stores the metrics (pb rtatio/ pe ratio/capexToOperating
CashFlow/operatingCashFlowPerShare) for the stocks along with the stock symbol, company
description, sector and name. The “users” column stores an auto incremented userId (primary
key), userName and password. The “portfolio” table contains id (auto incremented, primary
key), userName, portfoilioName, Stock1, stock_count_1, Stock2, stock_count_2, Stock3,
stock_count_3, Stock4, stock_count_4, Stock5 and stock_count_5. The “testout” table
contains calculated intermediate values and calculated rank for the different stocks when
compared against other stocks in its sector.
