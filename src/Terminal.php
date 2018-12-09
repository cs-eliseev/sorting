<?php

namespace sort;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Terminal extends Command
{
    /**
     * Configure
     */
    public function configure()
    {
        $this->setName('sort-file')
            ->setDescription('This console run command')
            ->addArgument('file', InputArgument::REQUIRED . 'Your file');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');
        if(!$file || !file_exists($file)){
            throw new InvalidArgumentException('No file!');
        }

        $resourse = fopen($file, 'rb');

        $data = [];
        while (!feof($resourse)) {
            $contents = fread($resourse, 1);
            $data[] = ord($contents);
        }
        fclose($resourse);

        $sort = new MergeSorting();

        $output->writeln(print_r($sort->sorting($data), true));
    }
}