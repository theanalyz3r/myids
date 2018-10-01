
 # myIDS

A New Open-Source Digital Signage platform, Bult using Laravel and VueJS, by a hobby coder who needed to Build something in his workplace, currently working and being used in a public building, using RaspberryPis at the Screen end, to keep as low budget as possible!

I've decided to put this out in the public realm as i hope we could develop this further.

## Installation

### Prerequisites

* To run this project, you must have PHP 7 installed.
* You should setup a host on your web server for your local domain. For this you could also configure Laravel Homestead or Valet.

### Step 1

Begin by cloning this repository to your machine, and installing all Composer & NPM dependencies.

```bash
git clone git@github.com:pda-tech/myids.git
cd council && composer install && npm install
npm run dev
```

### Step 2

Next, boot up a server and visit your forum. If using a tool like Laravel Valet, of course the URL will default to `http://myids.test`. 

Visit: `http://myids.test/register` to register a new user account

## Built With

* [Laravel](http://laravel.io) - The web framework used
* [VueJS](https://vue.js) - For the Javascript Framework

## Authors

* **Mitchell Bailey** - [mitch1793](https://github.com/mitch1793)

See also the list of [contributors](https://github.com/pda-tech/myids/contributors) who participated in this project.

## License

GNU GENERAL PUBLIC LICENSE Version 3
Please read [LICENSE.md](https://github.com/pda-tech/myids/blob/master/LICENSE) for more details.

## Contributing

Please read [CONTRIBUTING.md](https://github.com/pda-tech/myids) for details on our code of conduct, and the process for submitting pull requests to us.
