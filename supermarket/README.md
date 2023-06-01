From https://github.com/ardalis/kata-catalog/blob/main/katas/Supermarket%20Checkout.md

Note that overloading is not possible in PHP.

Price per lb is still a per unit price, since you cannot purchase one item when it's per pound.  You can
purchase some fraction of a pound of an item, but not one.

If yogurt can be purchased in quantities fewer than 3 for less than $2, than it is still the same batched-type item
as ramen and soup.  It's just that the per-unit pricing is $0.67.  There are stores that will sell items
advertised as 10 for $1 as up to 10 for $1 (which means, quantities 1 - 9 inclusive will still cost $1, 
and they're not prorated), but this was not the problem specified here.